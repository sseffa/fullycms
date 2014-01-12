<?php

class Category extends Eloquent {

    public $table = 'categories';
    public $timestamps = false;
    protected $fillable = ['title'];

    public function articles() {

        return $this->hasMany('Article');
    }
}
