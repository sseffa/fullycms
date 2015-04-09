<?php namespace Fully\Repositories\Page;

use Fully\Repositories\Page\PageInterface;

/**
 * Class AbstractPageDecorator
 * @package Fully\Repositories\Page
 * @author Sefa Karagöz
 */
abstract class AbstractPageDecorator implements PageInterface {

    /**
     * @var PageInterface
     */
    protected $page;

    /**
     * @param PageInterface $page
     */
    public function __construct(PageInterface $page) {

        $this->page = $page;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id) {

        return $this->page->find($id);
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug, $isPublished = false) {

        return $this->page->getBySlug($slug, $isPublished);
    }

    /**
     * @return mixed
     */
    public function all() {

        return $this->page->all();
    }

    /**
     * @param int $page
     * @param int $limit
     * @param bool $all
     * @return mixed
     */
    public function paginate($page = 1, $limit = 10, $all = false) {

        return $this->page->paginate($page = 1, $limit = 10, $all = false);
    }
}