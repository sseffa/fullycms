<?php namespace Sefa\Handlers;

use User;
use Log;
use Cache;

class AuthEventHandler {

    public function login($user) {

        Cache::flush();
        Log::info('User login. ID: ' . $user->id);
    }

    public function logout($user) {

        Cache::flush();
        Log::info('User logout. ID: ' . $user->id);
    }
}
