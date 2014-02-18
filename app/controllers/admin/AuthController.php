<?php namespace App\Controllers\Admin;

use BaseController;
use Redirect;
use Sentry;
use View;
use Input;
use Mail;
use Validator;
use Cache;
use Event;
use Sefa\Services\Mailer;

class AuthController extends BaseController {

    protected $user;

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
                $this->user = Sentry::authenticate($credentials, true);
            } else {
                $this->user = Sentry::authenticate($credentials, false);
            }

            if ($this->user) {

                Event::fire('user.login', $this->user);
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

        $this->user = Sentry::getUser();
        Event::fire('user.logout', $this->user);
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
            $this->user = Sentry::findUserByLogin($credentials['email']);

            // Get the password reset code
            $resetCode = $this->user->getResetPasswordCode();

            $formData = array('userId' => $this->user->id, 'resetCode' => $resetCode);

            /*
            Mail::send('emails.auth.reset-password', $formData, function ($message) {

                $message->from('noreply@sfcms.com', 'sf CMS Team');
                $message->to('user@sfcms.com', 'Lorem Lipsum')->subject('Reset Password');
            });
            */

            /*
            $mailer = new Mailer;
            $mailer->send('emails.auth.reset-password', 'user@sfcms.com', 'Reset Password', $formData);
            */

        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            return Redirect::route('admin.forgot.password')->withErrors(array('forgot-password' => $e->getMessage()));
        }
        catch (\Exception $e) {
            return Redirect::route('admin.forgot.password')->withErrors(array('forgot-password' => $e->getMessage()));
        }
    }

    public function getResetPassword($id, $code) {

        // Find the user using the user id
        $this->user = Sentry::findUserById($id);

        // Check if the reset password code is valid
        if (!$this->user->checkResetPasswordCode($code)) {
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
            $this->user = Sentry::findUserById($formData['id']);

            // Check if the reset password code is valid
            if ($this->user->checkResetPasswordCode($formData['code'])) {
                // Attempt to reset the user password
                if ($this->user->attemptResetPassword($formData['code'], $formData['password'])) {
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
