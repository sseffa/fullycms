<?php

class PhotoGalleryController extends BaseController {

    /**
     * Display photo gallery
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id) {

        $photo_gallery = PhotoGallery::findOrFail($id);
        $photos = Photo::where('relationship_id', '=', $id)->get();
        return View::make('frontend.photo_gallery.show', compact('photo_gallery', 'photos'));
    }
}
