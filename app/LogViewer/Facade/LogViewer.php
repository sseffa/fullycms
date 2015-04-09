<?php namespace Fully\LogViewer\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * Class LogViewer
 * @package Fully\Facades
 * @author Sefa Karagöz
 */
class LogViewer extends Facade {

    protected static function getFacadeAccessor() {

        return 'logviewer';
    }
}
