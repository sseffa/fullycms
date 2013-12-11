<?php

class Slider extends Eloquent {

    public $table = 'sliders';

    public function photos() {

        return $this->hasMany('Photo', 'relationship_id');
    }
}
