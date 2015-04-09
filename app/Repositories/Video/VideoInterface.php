<?php namespace Fully\Repositories\Video;

use Fully\Repositories\RepositoryInterface;

/**
 * Interface VideoInterface
 * @package Fully\Repositories\Video
 * @author Sefa Karagöz
 */
interface VideoInterface extends RepositoryInterface {

    /**
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug);
}