<?php namespace Sefa\Providers;

use Illuminate\Support\ServiceProvider;

class SearchServiceProvider extends ServiceProvider {

    public function register() {

        $this->app->bind('search', 'Sefa\Search\Search');
    }
}
