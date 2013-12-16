<?php

class Photo extends Eloquent {

    public $table = 'photos';
    public $timestamps = false;

    public function slider() {

        return $this->morphTo('Slider', 'relationship');
    }

    public function photo_gallery() {

        return $this->morphTo('PhotoGallery', 'relationship');
    }
}
