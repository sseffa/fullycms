<?php namespace Fully\Repositories\Page;

use Fully\Repositories\RepositoryInterface;

/**
 * Interface PageInterface
 * @package Fully\Repositories\Page
 * @author Sefa Karagöz
 */
interface PageInterface extends RepositoryInterface {

    /**
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug, $isPublished = false);
}