<?php namespace Fully\Repositories\PhotoGallery;

use Fully\Repositories\PhotoGallery\PhotoGalleryInterface;

/**
 * Class AbstractPhotoGalleryDecorator
 * @package Fully\Repositories\PhotoGallery
 * @author Sefa Karagöz
 */
abstract class AbstractPhotoGalleryDecorator implements PhotoGalleryInterface {

    /**
     * @var PhotoGalleryInterface
     */
    protected $photoGallery;

    /**
     * @param PhotoGalleryInterface $photoGallery
     */
    public function __construct(PhotoGalleryInterface $photoGallery) {

        $this->photoGallery = $photoGallery;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id) {

        return $this->photoGallery->find($id);
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function getBySlug($slug) {

        return $this->photoGallery->getBySlug($slug);
    }

    /**
     * @return mixed
     */
    public function all() {

        return $this->photoGallery->all();
    }

    /**
     * @param null $perPage
     * @param bool $all
     * @return mixed
     */
    public function paginate($page = 1, $limit = 10, $all = false) {

        return $this->photoGallery->paginate($page, $limit, $all);
    }
}