<?php

namespace Fully\Repositories\Tag;

/**
 * Class AbstractTagDecorator.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
abstract class AbstractTagDecorator implements TagInterface
{
    /**
     * @var TagInterface
     */
    protected $tag;

    /**
     * @param TagInterface $tag
     */
    public function __construct(TagInterface $tag)
    {
        $this->tag = $tag;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->tag->find($id);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->tag->all();
    }

    /**
     * @param null $perPage
     * @param bool $all
     *
     * @return mixed
     */
    public function paginate($page = 1, $limit = 10, $all = false)
    {
        return $this->tag->paginate($page, $limit, $all);
    }

    /**
     * @param $slug
     *
     * @return mixed
     */
    public function getArticlesBySlug($slug)
    {
        return $this->tag->getArticlesBySlug($slug);
    }
}
