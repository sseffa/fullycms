<?php namespace Fully\Events;

use Log;
use Cache;

/**
 * @deprecated
 * Class AuthEventHandler
 * @package Fully\Events
 * @author Sefa Karagöz
 */
class AuthEventHandler {

    /**
     * @param $events
     */
    public function subscribe($events) {

        $events->listen('user.login', 'Fully\Events\AuthEventHandler@login');
        $events->listen('user.logout', 'Fully\Events\AuthEventHandler@logout');
    }

    /**
     * @param $user
     */
    public function login($user) {

        Cache::flush();
        Log::info('User login. ID: ' . $user->id);
    }

    /**
     * @param $user
     */
    public function logout($user) {

        //Cache::flush();
        Log::info('User logout. ID: ' . $user->id);
    }
}
