<?php

namespace Fully\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Photo.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class Photo extends Model
{
    public $table = 'photos';
    public $timestamps = false;

    public function slider()
    {
        return $this->morphTo('Fully\Models\Slider', 'relationship');
    }

    public function photo_gallery()
    {
        return $this->morphTo('Fully\Models\PhotoGallery', 'relationship');
    }
}
