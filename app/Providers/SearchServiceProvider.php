<?php namespace Fully\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class SearchServiceProvider
 * @package Fully\Providers
 * @author Sefa Karagöz
 */
class SearchServiceProvider extends ServiceProvider {

    public function register() {

        $this->app->bind('search', 'Fully\Search\Search');
    }
}
