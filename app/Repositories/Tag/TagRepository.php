<?php

namespace Fully\Repositories\Tag;

use Config;
use Fully\Models\Tag;

/**
 * Class TagRepository.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class TagRepository implements TagInterface
{
    /**
     * @var
     */
    protected $perPage;

    /**
     * @var
     */
    protected $tag;

    public function __construct(Tag $tag)
    {
        $config = Config::get('fully');
        $this->perPage = $config['per_page'];
        $this->tag = $tag;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->tag->where('lang', getLang())->get();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->tag->findOrFail($id);
    }

    /**
     * Get paginated tags.
     *
     * @param int  $page  Number of tags per page
     * @param int  $limit Results per page
     * @param bool $all   Show published or all
     *
     * @return StdClass Object with $items and $totalItems for pagination
     */
    public function paginate($page = 1, $limit = 10, $all = false)
    {
        $result = new \StdClass();
        $result->page = $page;
        $result->limit = $limit;
        $result->totalItems = 0;
        $result->items = array();

        $query = $this->tag->orderBy('created_at', 'DESC')->where('lang', getLang());

        $tags = $query->skip($limit * ($page - 1))
            ->take($limit)
            ->get();

        $result->totalItems = $this->totalTags($all);
        $result->items = $tags->all();

        return $result;
    }

    /**
     * Get articles by tag slug.
     *
     * @param $slug
     *
     * @return mixed
     */
    public function getArticlesBySlug($slug)
    {
        return $this->tag->where('slug', $slug)->first()->articles()->paginate($this->perPage);
    }

    /**
     * Get total tag count.
     *
     * @return mixed
     */
    protected function totalTags()
    {
        return $this->tag->where('lang', getLang())->count();
    }
}
