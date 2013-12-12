<?php

class HomeController extends BaseController {

    public function index() {

        $slider = Slider::with('images')->get()->first();
        $images = $slider->images;

        return View::make('frontend/_layout/dashboard', compact('images'));
    }
}
