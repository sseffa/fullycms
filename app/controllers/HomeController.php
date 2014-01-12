<?php

class HomeController extends BaseController {

    protected $slider;

    public function __construct(Slider $slider) {

        $this->slider = $slider;
    }

    public function index() {

        $slider = $this->slider->with('images')->get()->first();
        if (isset($slider)) $images = $slider->images;
        return View::make('frontend/_layout/dashboard', compact('images'));
    }
}
