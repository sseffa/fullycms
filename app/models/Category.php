<?php

use Sefa\Interfaces\BaseModelInterface as BaseModelInterface;

class Category extends Eloquent implements BaseModelInterface {

    public $table = 'categories';
    public $timestamps = false;
    protected $fillable = ['title'];
    protected $appends = ['url'];

    public function articles() {

        return $this->hasMany('Article');
    }

    public function setUrlAttribute($value) {

        $this->attributes['url'] = $value;
    }

    public function getUrlAttribute() {

        return "/category/" . $this->attributes['title'];
    }
}
