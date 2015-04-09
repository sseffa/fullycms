<?php namespace Fully\Models;

use Fully\Interfaces\ModelInterface as ModelInterface;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

/**
 * Class Article
 * @author Sefa Karagöz
 */
class Article extends BaseModel implements ModelInterface, SluggableInterface {

    use SluggableTrait;

    public $table = 'articles';
    protected $fillable = ['title', 'content', 'meta_keywords', 'meta_description', 'is_published'];
    protected $appends = ['url'];

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
    );

    public function tags() {

        return $this->belongsToMany('Fully\Models\Tag', 'articles_tags');
    }

    public function category() {

        return $this->hasMany('Fully\Models\Category', 'id', 'category_id');
    }

    public function setUrlAttribute($value) {

        $this->attributes['url'] = $value;
    }

    public function getUrlAttribute() {

        return "article/" . $this->attributes['slug'];
    }
}
