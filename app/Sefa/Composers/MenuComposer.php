<?php namespace Sefa\Composers;

use Page, PhotoGallery;

class MenuComposer {

    public function compose($view) {

        $view->with('pages', Page::where('is_in_menu', "=", 1)->where('is_published', "=", 1)->get());
        $view->with('photo_galleries', PhotoGallery::where('is_in_menu', "=", 1)->where('is_published', "=", 1)->get());
    }
}

