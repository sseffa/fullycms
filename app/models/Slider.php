<?php

class Slider extends Eloquent {

    public $table = 'sliders';

    public function images() {

        return $this->hasMany('Photo', 'relationship_id');
    }
}
