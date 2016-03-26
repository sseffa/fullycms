<?php

namespace Fully\Repositories\Tag;

use Fully\Services\Cache\CacheInterface;

/**
 * Class CacheDecorator.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class CacheDecorator extends AbstractTagDecorator
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
    protected $cacheKey = 'tag';

    /**
     * @param TagInterface   $tag
     * @param CacheInterface $cache
     */
    public function __construct(TagInterface $tag, CacheInterface $cache)
    {
        parent::__construct($tag);
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

        $tag = $this->tag->find($id);

        $this->cache->put($key, $tag);

        return $tag;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        $key = md5(getLang().$this->cacheKey.'.all.tags');

        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $tags = $this->tag->all();

        $this->cache->put($key, $tags);

        return $tags;
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

        $paginated = $this->tag->paginate($page, $limit, $all);

        $this->cache->put($key, $paginated);

        return $paginated;
    }

    /**
     * @param $slug
     *
     * @return mixed
     */
    public function getArticlesBySlug($slug)
    {
        $key = md5(getLang().$this->cacheKey.'.all.tags.slug');

        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $tags = $this->tag->getArticlesBySlug($slug);

        //$this->cache->put($key, $tags);

        return $tags;
    }
}
