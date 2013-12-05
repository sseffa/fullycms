<?php

namespace App\Controllers\Admin;

use BaseController, Redirect, Sentry, View, Input, Mail, Validator;

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

    public function getForgotPassword() {

        if (!Sentry::check()) return View::make('backend/auth/forgot-password');
        else return Redirect::route('admin.dashboard');
    }

    public function postForgotPassword() {

        $credentials = array(
            'email' => Input::get('email')
        );

        $rules = array(
            'email' => 'required|email',
        );

        $validation = Validator::make($credentials, $rules);

        if ($validation->fails()) {

            return Redirect::back()->withErrors($validation)->withInput();
        }

        try {

            // Find the user using the user email address
            $user = Sentry::findUserByLogin($credentials['email']);

            // Get the password reset code
            $resetCode = $user->getResetPasswordCode();

            $formData = array('userId' => $user->id, 'resetCode' => $resetCode);

            Mail::send('emails.auth.reset-password', $formData, function ($message) {

                $message->from('noreply@sfcms.com', 'sf CMS Team');
                $message->to('karagozsefa@gmail.com', 'Sefa Karagöz')->subject('Reset Password');
            });
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            return Redirect::route('admin.forgot.password')->withErrors(array('forgot-password' => $e->getMessage()));
        }
        catch (\Exception $e) {
            return Redirect::route('admin.forgot.password')->withErrors(array('forgot-password' => $e->getMessage()));
        }
    }

    public function getResetPassword($id, $code) {

        // Find the user using the user id
        $user = Sentry::findUserById($id);

        // Check if the reset password code is valid
        if (!$user->checkResetPasswordCode($code)) {
            return Redirect::route('admin.login');
        }

        return View::make('backend/auth/reset-password', compact('id', 'code'));
    }

    public function postResetPassword() {

        $formData = array(
            'id'               => Input::get('id'),
            'code'             => Input::get('code'),
            'password'         => Input::get('password'),
            'confirm-password' => Input::get('confirm_password')
        );

        $rules = array(
            'id'               => 'required',
            'code'             => 'required',
            'password'         => 'required|min:4',
            'confirm-password' => 'required|same:password'
        );

        $validation = Validator::make($formData, $rules);

        if ($validation->fails()) {

            return Redirect::back()->withErrors($validation)->withInput();
        }

        try {
            // Find the user using the user id
            $user = Sentry::findUserById($formData['id']);

            // Check if the reset password code is valid
            if ($user->checkResetPasswordCode($formData['code'])) {
                // Attempt to reset the user password
                if ($user->attemptResetPassword($formData['code'], $formData['password'])) {
                    // Password reset passed
                    return Redirect::route('admin.login');
                } else {
                    // Password reset failed
                    return Redirect::action('App\Controllers\Admin\AuthController@getResetPassword')->withErrors(array('forgot-password' => 'Password reset failed'));
                }
            } else {
                // The provided password reset code is Invalid
                return Redirect::action('App\Controllers\Admin\AuthController@getResetPassword')->withErrors(array('forgot-password' => 'The provided password reset code is Invalid'));
            }
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {

            return Redirect::route('admin.forgot.password')->withErrors(array('forgot-password' => $e->getMessage()));
        }
    }
}
