<?php

use Sefa\Interfaces\BaseModelInterface as BaseModelInterface;

class Tag extends Eloquent implements BaseModelInterface {

    public $table = 'tags';
    protected $appends = ['url'];

    public function articles() {

        return $this->belongsToMany('Article', 'articles_tags');
    }

    public function setUrlAttribute($value) {

        $this->attributes['url'] = $value;
    }

    public function getUrlAttribute() {

        return "/tag/" . $this->attributes['slug'];
    }
}
