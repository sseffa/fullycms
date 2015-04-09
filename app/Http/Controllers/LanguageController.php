<?php namespace Fully\Http\Controllers;

/**
 * Class LanguageController
 * @author Sefa Karagöz
 */
class LanguageController extends Controller {

    public function setLocale($language) {

        LaravelLocalization::setLocale($language);
        return Redirect::route('dashboard');
    }
}
