<?php

class Article extends Eloquent {

    public $table = 'articles';
    protected $fillable = ['title', 'slug', 'content', 'meta_keywords', 'meta_description', 'is_published'];

    public function tags() {

        return $this->belongsToMany('Tag', 'articles_tags');
    }

    public function category() {

        return $this->hasMany('Category', 'id');
    }
}
