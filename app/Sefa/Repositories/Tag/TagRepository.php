<?php namespace Sefa\Repositories\Tag;

use Config;
use Tag;
use Sefa\Repositories\BaseRepositoryInterface as BaseRepositoryInterface;

class TagRepository {

    protected $perPage;
    protected $tag;

    public function __construct(Tag $tag) {

        $config = Config::get('sfcms');
        $this->perPage = $config['modules']['per_page'];
        $this->tag = $tag;
    }

    public function all() {

        return $this->tag->get();
    }

    public function find($id) {

        return $this->tag->findOrFail($id);
    }

    /**
     * Get articles by tag slug
     * @param $slug
     * @return mixed
     */
    public function bySlug($slug) {

        return $this->tag->where('slug', '=', $slug)->first()->articles()->paginate($this->perPage);
    }
}