<?php namespace Fully\Repositories\News;

use Fully\Repositories\RepositoryInterface;

/**
 * Interface NewsInterface
 * @package Fully\Repositories\News
 * @author Sefa Karagöz
 */
interface NewsInterface extends RepositoryInterface {

    /**
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug);
}