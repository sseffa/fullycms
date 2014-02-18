<?php namespace App\Controllers\Admin;

use BaseController;
use Redirect;
use View;
use Input;
use Validator;
use Slider;
use Response;
use File;
use Image;
use Photo;
use Notification;
use Config;

class SliderController extends BaseController {

    protected $width;
    protected $height;
    protected $imgDir;

    public function __construct() {

        View::share('active', 'plugins');

        $config = Config::get('sfcms');
        $this->width = $config['modules']['slider']['image_size']['width'];
        $this->height = $config['modules']['slider']['image_size']['height'];
        $this->imgDir = $config['modules']['slider']['image_dir'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $sliders = Slider::orderBy('created_at', 'DESC')
            ->paginate(15);
        return View::make('backend.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        if (Slider::get()->count() >= 1) {

            Notification::error('Only one home slider can be added');
            return Redirect::to("/admin/slider/");
        }

        $slider = new Slider();
        $slider->title = "Slider";
        $slider->save();
        $id = $slider->id;

        Notification::success('Slider was successfully added');
        return Redirect::to("/admin/slider/" . $id . "/edit");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {

        $slider = Slider::with('images')->findOrFail($id);

        $types = ['home' => 'Home'];
        return View::make('backend.slider.edit', compact('slider', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id) {

        $slider = Slider::findOrFail($id);
        $slider->title = Input::get('title');
        $slider->type = Input::get('type');

        $slider->save();
        Notification::success('Slider was successfully updated');
        return Redirect::route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {

        $slider = Slider::with('images')->findOrFail($id);
        $slider->delete();

        foreach ($slider->images as $photo) {

            Photo::where('file_name', '=', $photo->file_name)->delete();
            $destinationPath = public_path() . $this->imgDir;

            File::delete($destinationPath . $photo->file_name);
        }

        Notification::success('Slider was successfully deleted');
        return Redirect::route('admin.slider.index');
    }

    public function confirmDestroy($id) {

        $slider = Slider::findOrFail($id);
        return View::make('backend.slider.confirm-destroy', compact('slider'));
    }

    public function upload($id) {

        $file = Input::file('file');

        $rules = array('file' => 'mimes:jpg,jpeg,png|max:10000');
        $data = array('file' => Input::file('file'));

        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return Response::json($validation->errors()->first(), 400);
        }

        $destinationPath = public_path() . $this->imgDir;
        $fileName = $file->getClientOriginalName();
        $fileSize = $file->getClientSize();

        $upload_success = Input::file('file')->move($destinationPath, $fileName);

        if ($upload_success) {

            // resizing an uploaded file
            Image::make($destinationPath . $fileName)->resize($this->width, $this->height)->save($destinationPath . "slider_" . $fileName);
            File::delete($destinationPath . $fileName);

            $slider = Slider::findOrFail($id);
            $image = new Photo;
            $image->file_name = "slider_" . $fileName;
            $image->file_size = $fileSize;
            $image->title = explode(".", $fileName)[0];
            $image->path = $this->imgDir . 'slider_' . $fileName;
            $slider->images()->save($image);

            return Response::json('success', 200);
        }

        return Response::json('error', 400);
    }

    public function deleteImage() {

        $fileName = Input::get('file');
        Photo::where('file_name', '=', $fileName)->delete();
        $destinationPath = public_path() . $this->imgDir;
        File::delete($destinationPath . $fileName);
        return Response::json('success', 200);
    }
}
