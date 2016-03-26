<?php

namespace Fully\Repositories\Article;

use Fully\Repositories\RepositoryInterface;

/**
 * Interface ArticleInterface.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
interface ArticleInterface extends RepositoryInterface
{
    /**
     * @param $slug
     *
     * @return mixed
     */
    public function getBySlug($slug);
}
