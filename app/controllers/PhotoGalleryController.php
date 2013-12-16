<?php

class PhotoGalleryController extends BaseController {

    /**
     * Display photo gallery
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id) {

        $photo_gallery = PhotoGallery::with('photos')->findOrFail($id);
        return View::make('frontend.photo_gallery.show', compact('photo_gallery'));
    }
}
