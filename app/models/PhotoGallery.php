<?php

use Sefa\Interfaces\BaseModelInterface as BaseModelInterface;

class PhotoGallery extends BaseModel implements BaseModelInterface {

    public $table = 'photo_galleries';
    public $fillable = ['title', 'content', 'is_published'];
    protected $appends = ['url'];

    public function photos() {

        return $this->morphMany('Photo', 'relationship', 'type');
    }

    public function setUrlAttribute($value) {

        $this->attributes['url'] = $value;
    }

    public function getUrlAttribute() {

        return "/photo_gallery/" . $this->attributes['id'];
    }
}
