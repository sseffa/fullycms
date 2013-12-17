<?php namespace Sefa\Composers;

use Page;

class MenuComposer {

    protected $page;

    public function __consruct(Page $page) {

        $this->page = $page;
    }

    public function compose($view) {

        $view->with('pages', Page::where('is_in_menu', "=", 1)->where('is_published', "=", 1)->get());
    }
}

