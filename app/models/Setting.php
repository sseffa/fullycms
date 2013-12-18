<?php

class Setting extends Eloquent {

    public $table = 'settings';
    public $fillable = ['site_title', 'ga_code', 'meta_keywords', 'meta_description'];
}
