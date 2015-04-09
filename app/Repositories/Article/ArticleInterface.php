<?php namespace Fully\Repositories\Article;

use Fully\Repositories\RepositoryInterface;

/**
 * Interface ArticleInterface
 * @package Fully\Repositories\Article
 * @author Sefa Karagöz
 */
interface ArticleInterface extends RepositoryInterface {

    /**
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug);
}