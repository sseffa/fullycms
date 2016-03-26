<?php

namespace Fully\Repositories\News;

use Fully\Services\Cache\CacheInterface;

/**
 * Class CacheDecorator.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class CacheDecorator extends AbstractNewsDecorator
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
    protected $cacheKey = 'news';

    /**
     * @param NewsInterface  $news
     * @param CacheInterface $cache
     */
    public function __construct(NewsInterface $news, CacheInterface $cache)
    {
        parent::__construct($news);
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

        $news = $this->news->find($id);

        $this->cache->put($key, $news);

        return $news;
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

        $news = $this->news->getBySlug($slug);

        $this->cache->put($key, $news);

        return $news;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        $key = md5(getLang().$this->cacheKey.'.all.news');

        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $newss = $this->news->all();

        $this->cache->put($key, $newss);

        return $newss;
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
        $key = md5(getLang().$this->cacheKey.'page.'.$page.'.'.$limit.$allkey);

        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $paginated = $this->news->paginate($page, $limit, $all);

        $this->cache->put($key, $paginated);

        return $paginated;
    }

    /**
     * @param $limit
     *
     * @return mixed
     */
    public function getLastNews($limit)
    {
        $key = md5(getLang().$limit.$this->cacheKey.'.last');

        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $news = $this->news->getLastNews($limit);

        $this->cache->put($key, $news);

        return $news;
    }
}
