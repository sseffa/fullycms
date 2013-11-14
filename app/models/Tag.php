<?php

class Tag extends Eloquent {

    public $table = 'tags';

    public function articles() {

        return $this->belongsToMany('Article');
    }
}
