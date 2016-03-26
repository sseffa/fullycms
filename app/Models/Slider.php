<?php

namespace Fully\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Slider.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class Slider extends Model
{
    public $table = 'sliders';

    public function images()
    {
        return $this->morphMany('Fully\Models\Photo', 'relationship', 'type');
    }
}
