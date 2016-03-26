<?php

namespace Fully\Repositories\Page;

use Fully\Repositories\RepositoryInterface;

/**
 * Interface PageInterface.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
interface PageInterface extends RepositoryInterface
{
    /**
     * @param $slug
     *
     * @return mixed
     */
    public function getBySlug($slug, $isPublished = false);
}
