<?php

class Setting extends Eloquent {

    public $table = 'settings';
    public $fillable = ['site_title', 'ga_code', 'meta_keywords', 'meta_description'];

    public static  function getMeta() {

        $meta = Cache::get('settings', function () {

            $meta = Setting::get()->first()->toArray();
            Cache::forever('settings', $meta);
            return $meta;
        });

        return $meta;
    }
}
