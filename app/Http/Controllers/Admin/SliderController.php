<?php

namespace Fully\Http\Controllers\Admin;

use Fully\Http\Controllers\Controller;
use View;
use Input;
use Fully\Models\Slider;
use Response;
use File;
use Image;
use Config;
use Flash;

/**
 * Class SliderController.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class SliderController extends Controller
{
    protected $width;
    protected $height;
    protected $imgDir;

    public function __construct()
    {
        View::share('active', 'plugins');

        $config = Config::get('fully');
        $this->width = $config['modules']['slider']['image_size']['width'];
        $this->height = $config['modules']['slider']['image_size']['height'];
        $this->imgDir = $config['modules']['slider']['image_dir'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('created_at', 'DESC')->paginate(15);

        return view('backend.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $formData = Input::all();
        $slider = new Slider();

        $upload_success = null;

        if (isset($formData['image'])) {
            $file = $formData['image'];

            $destinationPath = public_path().$this->imgDir;
            $fileName = $file->getClientOriginalName();
            $fileSize = $file->getClientSize();

            $upload_success = $file->move($destinationPath, $fileName);

            // resizing an uploaded file
            Image::make($destinationPath.$fileName)->resize($this->width, $this->height)->save($destinationPath.$fileName);

            $slider->file_name = $fileName;
            $slider->file_size = $fileSize;

            $slider->path = $this->imgDir.$fileName;
        }

        $slider->title = $formData['title'];
        $slider->description = $formData['description'];
        $slider->lang = getLang();
        $slider->save();

        Flash::message('Slider was successfully added');

        return langRedirectRoute('admin.slider.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);

        return view('backend.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id)
    {
        $formData = Input::all();
        $slider = Slider::findOrFail($id);

        if (isset($formData['image'])) {
            if ($file = $formData['image']) {

                // delete old image
                $destinationPath = public_path().$this->imgDir;
                File::delete($destinationPath.$slider->file_name);

                $destinationPath = public_path().$this->imgDir;
                $fileName = $file->getClientOriginalName();
                $fileSize = $file->getClientSize();

                $upload_success = $file->move($destinationPath, $fileName);

                if ($upload_success) {

                    // resizing an uploaded file
                    Image::make($destinationPath.$fileName)->resize($this->width, $this->height)->save($destinationPath.$fileName);

                    $slider->file_name = $fileName;
                    $slider->file_size = $fileSize;
                    $slider->path = $this->imgDir.$fileName;
                }
            }
        }
        $slider->title = $formData['title'];
        $slider->description = $formData['description'];
        $slider->save();

        Flash::message('Slider was successfully updated');

        return langRedirectRoute('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $slider = Slider::with('images')->findOrFail($id);
        $destinationPath = public_path().$this->imgDir;

        File::delete($destinationPath.$slider->file_name);
        $slider->delete();

        Flash::message('Slider was successfully deleted');

        return langRedirectRoute('admin.slider.index');
    }

    public function confirmDestroy($id)
    {
        $slider = Slider::findOrFail($id);

        return view('backend.slider.confirm-destroy', compact('slider'));
    }
}
