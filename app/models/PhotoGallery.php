<?php

class PhotoGallery extends Eloquent {

    public $table = 'photo_galleries';

    public function photos() {

        return $this->morphMany('Photo', 'relationship', 'type');
    }
}
