<?php

if (!function_exists('gratavarUrl')) {
    /**
     * Gravatar URL from Email address
     *
     * @param string $email Email address
     * @param string $size Size in pixels
     * @param string $default Default image [ 404 | mm | identicon | monsterid | wavatar ]
     * @param string $rating Max rating [ g | pg | r | x ]
     *
     * @return string
     */
    function gratavarUrl($email, $size = 60, $default = 'mm', $rating = 'g') {

        return 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($email))) . "?s={$size}&d={$default}&r={$rating}";
    }
}


/**
 * Backend menu active
 * @param $path
 * @param string $active
 * @return string
 */
function setActive($path, $active = 'active') {

    if (is_array($path)) {

        foreach ($path as $k => $v) {
            $path[$k] = getLang() . "/" . $v;
        }
    } else {
        $path = getLang() . "/" . $path;
    }

    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

/**
 * @return mixed
 */
function getLang() {

    return LaravelLocalization::getCurrentLocale();
}

/**
 * @param null $url
 * @return mixed
 */
function langURL($url = null) {

    //return LaravelLocalization::getLocalizedURL(getLang(), $url);

    return getLang() . $url;
}

/**
 * @param $route
 * @return mixed
 */
function langRoute($route, $parameters = array()) {

    return URL::route(getLang() . "." . $route, $parameters);
}

/**
 * @param $route
 * @return mixed
 */
function langRedirectRoute($route) {

    return Redirect::route(getLang() . "." . $route);
}