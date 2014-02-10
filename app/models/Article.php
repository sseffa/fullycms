<?php

use Sefa\Interfaces\BaseModelInterface as BaseModelInterface;

class Article extends BaseModel implements BaseModelInterface {

    public $table = 'articles';
    protected $fillable = ['title', 'slug', 'content', 'meta_keywords', 'meta_description', 'is_published'];
    protected $appends = ['url'];

    public function tags() {

        return $this->belongsToMany('Tag', 'articles_tags');
    }

    public function category() {

        return $this->hasMany('Category', 'id', 'category_id');
    }

    public function setUrlAttribute($value) {

        $this->attributes['url'] = $value;
    }

    public function getUrlAttribute() {

        return "article/" . $this->attributes['id'] . "/" . $this->attributes['slug'];
    }
}
