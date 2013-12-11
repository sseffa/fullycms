<?php

namespace App\Controllers\Admin;

use BaseController, Redirect, View, Input, Validator, Slider, Response, File, Image, Photo;

class SliderController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $sliders = Slider::orderBy('created_at', 'DESC')
            ->paginate(15);
        return View::make('backend.slider.index', compact('sliders'))->with('active', 'slider');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        $slider = new Slider();
        $slider->title = "Slider";
        $slider->save();
        $id = $slider->id;

        return Redirect::to("/admin/slider/" . $id . "/edit")->with('message', 'Slider was successfully added');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {

        $slider = Slider::findOrFail($id);
        $photos = Photo::where('relationship_id', '=', $id)->get();

        $types = ['home' => 'Home'];

        return View::make('backend.slider.edit', compact('slider', 'photos', 'types'));
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
        return Redirect::action('App\Controllers\Admin\SliderController@index')->with('message', 'Slider was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
    }

    public function togglePublish($id) {
    }

    public function toggleMenu($id) {
    }

    public function upload($id) {

        $file = Input::file('file');

        $rules = array('file' => 'mimes:jpg,jpeg,bmp,png|max:10000');
        $data = array('file' => Input::file('file'));

        $validation = Validator::make($data, $rules);

        if ($validation->fails()) {
            return Response::json($validation->errors()->first(), 400);
        }

        $destinationPath = public_path() . '/uploads/dropzone/';
        $fileName = $file->getClientOriginalName();
        $fileSize = $file->getClientSize();

        $upload_success = Input::file('file')->move($destinationPath, $fileName);

        if ($upload_success) {

            // resizing an uploaded file
            Image::make($destinationPath . $fileName)->resize(150, 150)->save($destinationPath . "150x150_" . $fileName);

            $slider = Slider::findOrFail($id);
            $image = new Photo;
            $image->file_name = $fileName;
            $image->file_size = $fileSize;
            $image->title = explode(".", $fileName)[0];
            $image->path = '/uploads/dropzone/' . $fileName;
            $slider->photos()->save($image);

            return Response::json('success', 200);
        }
    }

    public function deleteImage() {
    }
}
