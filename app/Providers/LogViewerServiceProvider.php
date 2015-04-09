<?php namespace Fully\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class LogViewerServiceProvider
 * @package Fully\Providers
 * @author Sefa Karagöz
 */
class LogViewerServiceProvider extends ServiceProvider {

    public function register() {

        $this->app->bind('logviewer', 'Fully\LogViewer\LogViewer');
    }
}
