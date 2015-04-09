<?php namespace Fully\Composers;

use Menu;
use Page;
use PhotoGallery;
use FormPost;
use Fully\Repositories\Menu\MenuInterface;

/**
 * Class MenuComposer
 * @package Fully\Composers
 * @author Sefa Karagöz
 */
class MenuComposer {

    /**
     * @var \Fully\Repositories\Menu\MenuInterface
     */
    protected $menu;

    /**
     * @param MenuInterface $menu
     */
    public function __construct(MenuInterface $menu){

        $this->menu=$menu;
    }

    /**
     * @param $view
     */
    public function compose($view) {

        $items = $this->menu->all();
        $menus = $this->menu->getFrontMenuHTML($items);
        $view->with('menus', $menus);
    }
}

