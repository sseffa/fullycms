<?php

namespace Fully\Repositories\Menu;

/**
 * Class AbstractMenuDecorator.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
abstract class AbstractMenuDecorator implements MenuInterface
{
    /**
     * @var MenuInterface
     */
    protected $menu;

    /**
     * @param MenuInterface $menu
     */
    public function __construct(MenuInterface $menu)
    {
        $this->menu = $menu;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->menu->all();
    }

    /**
     * @param $menu
     * @param int  $parentId
     * @param bool $starter
     *
     * @return mixed
     */
    public function generateFrontMenu($menu, $parentId = 0, $starter = false)
    {
        return $this->menu->generateFrontMenu($menu, $parentId, $starter);
    }

    /**
     * @param $id
     *
     * @return bool
     */
    public function hasChildItems($id)
    {
        $this->menu->hasChildItems($id);
    }
}
