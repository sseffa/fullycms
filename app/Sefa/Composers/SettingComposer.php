<?php namespace Sefa\Composers;

use Setting;

class SettingComposer {

    public function compose($view) {

        $settings = (Setting::get()->first()) ? Setting::get()->first()->toArray() : array();
        $view->with('settings', $settings);
    }
}