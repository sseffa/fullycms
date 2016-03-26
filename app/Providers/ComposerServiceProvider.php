<?php

namespace Fully\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     */
    public function boot()
    {
        // Frontend
        View::composer('frontend.layout.menu', 'Fully\Composers\MenuComposer');
        View::composer('frontend.layout.layout', 'Fully\Composers\SettingComposer');
        View::composer('frontend.layout.footer', 'Fully\Composers\ArticleComposer');
        View::composer('frontend.news.sidebar', 'Fully\Composers\NewsComposer');

        // Backend
        View::composer('backend/layout/layout', 'Fully\Composers\Admin\MenuComposer');
    }

    /**
     * Register.
     */
    public function register()
    {
    }
}
