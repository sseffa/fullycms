<?php

use Sefa\Interfaces\BaseModelInterface as BaseModelInterface;

class Page extends BaseModel implements BaseModelInterface {

    public $table = 'pages';
    protected $fillable = ['title', 'content', 'is_published'];
    protected $appends = ['url'];

    public function setUrlAttribute($value) {

        $this->attributes['url'] = $value;
    }

    public function getUrlAttribute() {

        return "/page/" . $this->attributes['id'];
    }
}
