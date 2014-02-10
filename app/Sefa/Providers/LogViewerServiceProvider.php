<?php namespace Sefa\Providers;

use Illuminate\Support\ServiceProvider;

class LogViewerServiceProvider extends ServiceProvider {

    public function register() {

        $this->app->bind('logviewer', 'Sefa\LogViewer\LogViewer');
    }
}
