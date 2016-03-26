<?php

namespace Fully\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Fully\Interfaces\ModelInterface as ModelInterface;

/**
 * Class Video.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class Video extends Model implements ModelInterface, SluggableInterface
{
    use SluggableTrait;

    public $table = 'videos';
    public $fillable = ['title', 'video_id', 'type'];

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to' => 'slug',
    );

    public function getDetailsAttribute()
    {
        return $this->attributes['details'];
    }

    public function setDetailsAttribute($value)
    {
        $this->attributes['details'] = $value;
    }

    public function setUrlAttribute($value)
    {
        $this->attributes['url'] = $value;
    }

    public function getUrlAttribute()
    {
        return 'video/'.$this->attributes['slug'];
    }
}
