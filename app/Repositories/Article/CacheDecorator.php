<?php

namespace Fully\Repositories\Article;

use Fully\Services\Cache\CacheInterface;

/**
 * Class CacheDecorator.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class CacheDecorator extends AbstractArticleDecorator
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
    protected $cacheKey = 'article';

    /**
     * @param ArticleInterface $article
     * @param CacheInterface   $cache
     */
    public function __construct(ArticleInterface $article, CacheInterface $cache)
    {
        parent::__construct($article);
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

        $article = $this->article->find($id);

        $this->cache->put($key, $article);

        return $article;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        $key = md5(getLang().$this->cacheKey.'.all.articles');

        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $articles = $this->article->all();

        $this->cache->put($key, $articles);

        return $articles;
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

        $paginated = $this->article->paginate($page, $limit, $all);

        $this->cache->put($key, $paginated);

        return $paginated;
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

        $article = $this->article->getBySlug($slug);

        $this->cache->put($key, $article);

        return $article;
    }

    /**
     * @param $limit
     *
     * @return mixed
     */
    public function getLastArticle($limit)
    {
        $key = md5(getLang().$limit.$this->cacheKey.'.last');

        if ($this->cache->has($key)) {
            return $this->cache->get($key);
        }

        $articles = $this->article->getLastArticle($limit);

        $this->cache->put($key, $articles);

        return $articles;
    }
}
