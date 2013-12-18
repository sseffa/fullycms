<?php namespace Sefa\Composers;

use Setting;

class SettingComposer {

    public function compose($view) {

        $view->with('settings', Setting::get()->first()->toArray());
    }
}

