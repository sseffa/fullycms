<?php namespace Sefa\Composers\Admin;

use FormPost;

class MenuComposer {

    public function compose($view) {

        $view->with('formPostCount', FormPost::where('is_answered', 0)->count());
    }
}

