<?php

namespace Fully\Repositories\Project;

/**
 * Class AbstractProjectDecorator.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
abstract class AbstractProjectDecorator implements ProjectInterface
{
    /**
     * @var ProjectInterface
     */
    protected $project;

    /**
     * @param ProjectInterface $project
     */
    public function __construct(ProjectInterface $project)
    {
        $this->project = $project;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->project->find($id);
    }

    /**
     * @param $slug
     *
     * @return mixed
     */
    public function getBySlug($slug)
    {
        return $this->project->getBySlug($slug);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->project->all();
    }

    /**
     * @param null $perPage
     * @param bool $all
     *
     * @return mixed
     */
    public function paginate($page = 1, $limit = 10, $all = false)
    {
        return $this->project->paginate($page, $limit, $all);
    }
}
