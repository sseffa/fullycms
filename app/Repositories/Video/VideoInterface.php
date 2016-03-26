<?php

namespace Fully\Repositories\Video;

use Fully\Repositories\RepositoryInterface;

/**
 * Interface VideoInterface.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
interface VideoInterface extends RepositoryInterface
{
    /**
     * @param $slug
     *
     * @return mixed
     */
    public function getBySlug($slug);
}
