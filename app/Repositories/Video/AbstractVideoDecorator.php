<?php

namespace Fully\Repositories\Video;

/**
 * Class AbstractVideoDecorator.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
abstract class AbstractVideoDecorator implements VideoInterface
{
    /**
     * @var VideoInterface
     */
    protected $video;

    /**
     * @param VideoInterface $video
     */
    public function __construct(VideoInterface $video)
    {
        $this->video = $video;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->video->find($id);
    }

    /**
     * @param $slug
     *
     * @return mixed
     */
    public function getBySlug($slug)
    {
        return $this->video->getBySlug($slug);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->video->all();
    }

    /**
     * Paginator
     * @param int $page
     * @param int $limit
     * @param bool $all
     * @return mixed
     */
    public function paginate($page = 1, $limit = 10, $all = false)
    {
        return $this->video->paginate($page, $limit, $all);
    }
}
