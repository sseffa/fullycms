<?php

class Photo extends Eloquent {

    public $table = 'photos';
    public $timestamps = false;

    public function sliders() {

        return $this->belongsTo('Slider', 'relationship_id');
    }

    public function photo_galleries() {

        return $this->belongsTo('PhotoGallery', 'relationship_id');
    }
}
