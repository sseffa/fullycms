<?php

namespace Fully\Repositories\Slider;

use Fully\Models\Slider;
use Fully\Repositories\AbstractValidator as Validator;

/**
 * Class SliderRepository.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class SliderRepository extends Validator implements SliderInterface
{
    /**
     * @var \Slider
     */
    protected $slider;

    /**
     * @param Slider $slider
     */
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->slider->where('lang', getLang())->orderBy('created_at', 'DESC')->get();
    }
}
