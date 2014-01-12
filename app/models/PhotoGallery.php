<?php

class PhotoGallery extends Eloquent {

    public $table = 'photo_galleries';
    public $fillable = ['title', 'content', 'is_published', 'is_in_menu'];

    public function photos() {

        return $this->morphMany('Photo', 'relationship', 'type');
    }
}
