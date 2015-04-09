<?php namespace Fully\Repositories\News;

use Fully\Repositories\News\NewsInterface;

/**
 * Class AbstractNewsDecorator
 * @package Fully\Repositories\News
 * @author Sefa Karagöz
 */
abstract class AbstractNewsDecorator implements NewsInterface {

    /**
     * @var NewsInterface
     */
    protected $news;

    /**
     * @param NewsInterface $news
     */
    public function __construct(NewsInterface $news) {

        $this->news = $news;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id) {

        return $this->news->find($id);
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug){

        return $this->news->getBySlug($slug);
    }

    /**
     * @return mixed
     */
    public function all() {

        return $this->news->all();
    }

    /**
     * @param null $perPage
     * @param bool $all
     * @return mixed
     */
    public function paginate($page = 1, $limit = 10, $all = false) {

        return $this->news->paginate($page, $limit, $all);
    }
}