<?php

class Page extends Eloquent {

    public $table = 'pages';
    protected $fillable = ['title', 'content', 'is_in_menu', 'is_published'];
}
