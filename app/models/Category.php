<?php

class Category extends Eloquent {

    public $table = 'categories';

    public function articles() {

        return $this->hasMany('Article');
    }
}
