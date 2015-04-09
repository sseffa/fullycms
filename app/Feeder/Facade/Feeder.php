<?php namespace Fully\Feeder\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Class Feeder
 * @package Fully\Facades
 * @author Sefa Karagöz
 */
class Feeder extends Facade {

    /**
     * @return string
     */
    protected static function getFacadeAccessor() {

        return 'feeder';
    }
}
