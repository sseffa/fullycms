<?php

namespace Fully\Repositories\PhotoGallery;

use Fully\Services\Cache\CacheInterface;

/**
 * Class CacheDecorator.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class CacheDecorator extends AbstractPhotoGalleryDecorator
{
    /**
     * @var \Fully\Services\Cache\CacheInterface
     */
    protected $cache;

    /**
     * Cache key.
     *
     * @var string
     */
    protected $cacheKey = 'photo_gallery';

    /**
     * @param PhotoGalleryInterface $photoGallery
     * @param CacheInterface        $cache
     */
    public function __construct(PhotoGalleryInterface $photoGallery, CacheInterface $cache)
    {
        parent::__construct($photoGallery);
        $this->cache = $cache;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        $key = md5(getLang().$this->cacheKey.'.id.'.$id);

        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $photoGallery = $this->photoGallery->find($id);

        $this->cache->put($key, $photoGallery);

        return $photoGallery;
    }

    /**
     * @param $slug
     *
     * @return mixed
     */
    public function getBySlug($slug)
    {
        $key = md5(getLang().$this->cacheKey.'.slug.'.$slug);

        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $photoGallery = $this->photoGallery->getBySlug($slug);

        $this->cache->put($key, $photoGallery);

        return $photoGallery;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        $key = md5(getLang().$this->cacheKey.'.all');

        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $photoGallerys = $this->photoGallery->all();

        $this->cache->put($key, $photoGallerys);

        return $photoGallerys;
    }

    /**
     * @param null $page
     * @param bool $all
     *
     * @return mixed
     */
    public function paginate($page = 1, $limit = 10, $all = false)
    {
        $allkey = ($all) ? '.all' : '';
        $key = md5(getLang().$this->cacheKey.'.page.'.$page.'.'.$limit.$allkey);

        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $paginated = $this->photoGallery->paginate($page, $limit, $all);

        $this->cache->put($key, $paginated);

        return $paginated;
    }

    /**
     * @param $tag
     *
     * @return mixed|void
     */
    public function findByTag($tag)
    {
    }
}
