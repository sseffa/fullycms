<?php

class Article extends Eloquent {

    public $table = 'articles';

    public function tags() {

        return $this->belongsToMany('Tag', 'articles_tags');
    }
}
