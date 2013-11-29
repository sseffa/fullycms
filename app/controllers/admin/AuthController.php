<?php

namespace App\Controllers\Admin;

use BaseController, Redirect, Sentry, View, Input;

class AuthController extends BaseController {

    /**
     * Display the login page
     * @return View
     */
    public function getLogin() {

        if (!Sentry::check()) return View::make('backend/auth/login');
        else return Redirect::route('admin.dashboard');
    }

    /**
     * Login action
     * @return Redirect
     */
    public function postLogin() {

        $credentials = array(
            'email'    => Input::get('email'),
            'password' => Input::get('password')
        );

        $rememberMe = Input::get('rememberMe');

        try {

            if (!empty($rememberMe)) {
                $user = Sentry::authenticate($credentials, true);
            } else {
                $user = Sentry::authenticate($credentials, false);
            }

            if ($user) {
                return Redirect::route('admin.dashboard');
            }
        } catch (\Exception $e) {
            return Redirect::route('admin.login')->withErrors(array('login' => $e->getMessage()));
        }
    }

    /**
     * Logout action
     * @return Redirect
     */
    public function getLogout() {

        Sentry::logout();

        return Redirect::route('admin.login');
    }
}
