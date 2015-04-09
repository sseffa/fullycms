<?php namespace Fully\Repositories\Slider;

use Fully\Repositories\Slider\SliderInterface;

/**
 * Class AbstractSliderDecorator
 * @package Fully\Repositories\Slider
 * @author Sefa Karagöz
 */
abstract class AbstractSliderDecorator implements SliderInterface {

    /**
     * @var SliderInterface
     */
    protected $slider;

    /**
     * @param SliderInterface $slider
     */
    public function __construct(SliderInterface $slider) {

        $this->slider = $slider;
    }

    /**
     * @return mixed
     */
    public function all() {

        return $this->slider->all();
    }
}