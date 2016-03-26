<?php

namespace Fully\Http\Controllers\Admin;

use Fully\Http\Controllers\Controller;
use Config;
use LaravelLocalization;

/**
 * Class FaqController.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class LanguageController extends Controller
{
    public function setLocale($language)
    {
        //var_dump($language);

        //var_dump(Config::get('app.locale'));
        LaravelLocalization::setLocale($language);
        //var_dump(Config::get('app.locale'));
    }
}
