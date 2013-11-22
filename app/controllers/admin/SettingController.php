<?php

namespace App\Controllers\Admin;

use BaseController, Redirect, View, Input, Validator, Response, Tag, Str, Setting;

class SettingController extends BaseController {

    public function index() {

        $setting = Setting::findOrFail(1);
        return View::make('backend.setting.setting', compact('setting'))->with('active', 'settings');
    }

    public function save() {

        $formData = array(
            'title'            => Input::get('title'),
            'ga_code'          => Input::get('ga_code'),
            'meta_title'       => Input::get('meta_title'),
            'meta_keywords'    => Input::get('meta_keywords'),
            'meta_description' => Input::get('meta_description')
        );

        $setting = Setting::findOrFail(1);
        $setting->site_title = $formData['title'];
        $setting->ga_code = $formData['ga_code'];
        $setting->meta_title = $formData['meta_title'];
        $setting->meta_keywords = $formData['meta_keywords'];
        $setting->meta_description = $formData['meta_description'];
        $setting->save();

        return Redirect::action('App\Controllers\Admin\SettingController@index')->with('message', 'Settings was successfully updated');;
    }
}
