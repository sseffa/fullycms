<?php namespace Fully\Search\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Class Search
 * @package Fully\Facades
 * @author Sefa Karagöz
 */
class Search extends Facade {

    protected static function getFacadeAccessor() {

        return 'search';
    }
}
