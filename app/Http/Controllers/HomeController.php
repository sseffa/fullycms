<?php

namespace Fully\Http\Controllers;

use Fully\Repositories\Project\ProjectInterface;
use Fully\Repositories\Slider\SliderInterface;
use Fully\Repositories\Tag\TagInterface;
use LaravelLocalization;

/**
 * Class HomeController.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class HomeController extends Controller
{
    protected $slider;
    protected $project;
    protected $tag;

    public function __construct(SliderInterface $slider, ProjectInterface $project, TagInterface $tag)
    {
        $this->slider = $slider;
        $this->project = $project;
        $this->tag = $tag;
    }

    public function index()
    {
        $languages = LaravelLocalization::getSupportedLocales();

        $sliders = $this->slider->all();
        $projects = $this->project->all();
        $tags = $this->tag->all();

        return view('frontend/layout/dashboard', compact('sliders', 'projects', 'languages', 'tags'));
    }
}
