<?php

namespace App\Controllers\Admin;

use BaseController, Redirect, View, Input, Setting;

class SettingController extends BaseController {

    public function index() {

        $setting = Setting::findOrFail(1);
        return View::make('backend.setting.setting', compact('setting'))->with('active', 'settings');
    }

    public function save() {

        $setting = Setting::findOrFail(1);
        $setting->fill(Input::all())->save();
        return Redirect::route('admin.settings')->with('message', 'Settings was successfully updated');
    }
}
