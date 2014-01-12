<?php

class News extends Eloquent {

    public $table = 'news';
    public $fillable=['title', 'slug', 'content', 'datetime', 'is_published'];
}