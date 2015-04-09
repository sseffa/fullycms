<?php namespace Fully\Repositories\Project;

use Fully\Repositories\RepositoryInterface;

/**
 * Interface ProjectInterface
 * @package Fully\Repositories\Project
 * @author Sefa Karagöz
 */
interface ProjectInterface extends RepositoryInterface {

    /**
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug);
}