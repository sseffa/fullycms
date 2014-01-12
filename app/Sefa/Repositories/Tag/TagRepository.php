<?php namespace Sefa\Repositories\Tag;

use Config;
use Tag;
use Sefa\Repositories\BaseRepositoryInterface as BaseRepositoryInterface;

class TagRepository {

    protected $perPage;

    public function __construct() {

        $config = Config::get('sfcms');
        $this->perPage = $config['modules']['per_page'];
    }

    public function all() {

        return Tag::get();
    }

    public function find($id) {

        return Tag::findOrFail($id);
    }

    /**
     * Get articles by tag slug
     * @param $slug
     * @return mixed
     */
    public function bySlug($slug) {

        return Tag::where('slug', '=', $slug)->first()->articles()->paginate($this->perPage);
    }
}