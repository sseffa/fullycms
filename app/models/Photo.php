<?php

class Photo extends Eloquent {

    public $table = 'photos';
    public $timestamps = false;

    public function slider() {

        return $this->belongsTo('Slider', 'relationship_id');
    }

    public function photo_gallery() {

        return $this->belongsTo('PhotoGallery', 'relationship_id');
    }
}
