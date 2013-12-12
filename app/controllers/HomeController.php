<?php

class HomeController extends BaseController {

    public function index() {

        // after change
        $slider = Slider::where('type', '=', 'home')->get()->toArray();

        if(!$slider)
            return View::make('frontend/_layout/dashboard');


        $photos = Photo::where('relationship_id', '=', $slider[0]['id'])->get()->toArray();

        return View::make('frontend/_layout/dashboard', compact('photos'));
    }
}
