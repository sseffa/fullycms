<?php namespace Sefa\Composers;

use Menu;
use Page;
use PhotoGallery;
use FormPost;

class MenuComposer {

    public function compose($view) {

        $menu = new Menu;
        $items = $menu->where('is_published', 1)->orderBy('order', 'asc')->get();
        $menus = $menu->getFrontMenuHTML($items);

        $view->with('menus', $menus);
        $view->with('formPostCount', FormPost::where('is_answered', 0)->count());
    }
}

