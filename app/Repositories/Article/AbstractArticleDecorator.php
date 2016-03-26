<?php

namespace Fully\Repositories\Article;

/**
 * Class AbstractArticleDecorator.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
abstract class AbstractArticleDecorator implements ArticleInterface
{
    /**
     * @var ArticleInterface
     */
    protected $article;

    /**
     * @param ArticleInterface $article
     */
    public function __construct(ArticleInterface $article)
    {
        $this->article = $article;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->article->find($id);
    }

    /**
     * @param $slug
     *
     * @return mixed
     */
    public function getBySlug($slug)
    {
        return $this->article->getBySlug($slug);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->article->all();
    }

    /**
     * @param null $perPage
     * @param bool $all
     *
     * @return mixed
     */
    public function paginate($page = 1, $limit = 10, $all = false)
    {
        return $this->article->paginate($page, $limit, $all);
    }
}
