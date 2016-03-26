<?php

namespace Fully\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class SearchServiceProvider.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class SearchServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('search', 'Fully\Search\Search');
    }
}
