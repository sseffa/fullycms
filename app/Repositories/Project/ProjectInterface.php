<?php

namespace Fully\Repositories\Project;

use Fully\Repositories\RepositoryInterface;

/**
 * Interface ProjectInterface.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
interface ProjectInterface extends RepositoryInterface
{
    /**
     * @param $slug
     *
     * @return mixed
     */
    public function getBySlug($slug);
}
