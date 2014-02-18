<?php namespace Sefa\Providers;

use Illuminate\Support\ServiceProvider;
use Sefa\Feeder\Feeder;

class FeederServiceProvider extends ServiceProvider {

    public function register() {

        $this->app->bind('feeder', 'Sefa\Feeder\Feeder');
    }
}
