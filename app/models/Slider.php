<?php

class Slider extends Eloquent {

    public $table = 'sliders';

    public function images() {

        return $this->morphMany('Photo', 'relationship', 'type');
    }
}
