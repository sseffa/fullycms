<?php

namespace Fully\Repositories\PhotoGallery;

use Fully\Repositories\RepositoryInterface;

/**
 * Interface PhotoGalleryInterface.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
interface PhotoGalleryInterface extends RepositoryInterface
{
    /**
     * @param $slug
     *
     * @return mixed
     */
    public function getBySlug($slug);
}
