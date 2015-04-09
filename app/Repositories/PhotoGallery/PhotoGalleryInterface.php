<?php namespace Fully\Repositories\PhotoGallery;

use Fully\Repositories\RepositoryInterface;

/**
 * Interface PhotoGalleryInterface
 * @package Fully\Repositories\PhotoGallery
 * @author Sefa Karagöz
 */
interface PhotoGalleryInterface extends RepositoryInterface {

    /**
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug);
}