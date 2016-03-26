<?php

namespace Fully\Models;

use Cviebrock\EloquentSluggable\SluggableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Fully\Interfaces\ModelInterface as ModelInterface;

/**
 * Class News.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class News extends BaseModel implements ModelInterface, SluggableInterface
{
    use SluggableTrait;

    public $table = 'news';
    public $fillable = ['title', 'content', 'datetime', 'is_published'];
    protected $appends = ['url'];

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to' => 'slug',
    );

    public function setUrlAttribute($value)
    {
        $this->attributes['url'] = $value;
    }

    public function getUrlAttribute()
    {
        return getLang().'/news/'.$this->attributes['slug'];
    }
}
