<?php

namespace Fully\Repositories\Page;

use Fully\Services\Cache\CacheInterface;

/**
 * Class CacheDecorator.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class CacheDecorator extends AbstractPageDecorator
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
    protected $cacheKey = 'page';

    /**
     * @param PageInterface  $category
     * @param CacheInterface $cache
     */
    public function __construct(PageInterface $page, CacheInterface $cache)
    {
        parent::__construct($page);
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

        $page = $this->page->find($id);

        $this->cache->put($key, $page);

        return $page;
    }

    /**
     * @param $slug
     *
     * @return mixed
     */
    public function getBySlug($slug, $isPublished = false)
    {
        $key = md5(getLang().$this->cacheKey.'.slug.'.$slug);

        if ($isPublished === true) {
            $key = md5(getLang().$this->cacheKey.'.slug.'.$slug.'.published');
        }

        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $page = $this->page->getBySlug($slug, $isPublished);

        $this->cache->put($key, $page);

        return $page;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        $key = md5(getLang().$this->cacheKey.'.all.pages');

        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $pages = $this->page->all();

        $this->cache->put($key, $pages);

        return $pages;
    }

    /**
     * @param int  $page
     * @param int  $limit
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

        $paginated = $this->page->paginate($page, $limit, $all);

        $this->cache->put($key, $paginated);

        return $paginated;
    }
}
