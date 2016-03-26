<?php

namespace Fully\Repositories\Page;

use Fully\Models\Page;
use Config;
use Response;
use Fully\Repositories\RepositoryAbstract;
use Fully\Repositories\CrudableInterface as CrudableInterface;
use Fully\Exceptions\Validation\ValidationException;

/**
 * Class PageRepository.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class PageRepository extends RepositoryAbstract implements PageInterface, CrudableInterface
{
    /**
     * @var
     */
    protected $perPage;
    /**
     * @var \Page
     */
    protected $page;
    /**
     * Rules.
     *
     * @var array
     */
    protected static $rules = [
        'title' => 'required|min:3',
        'content' => 'required|min:5', ];

    /**
     * @param Page $page
     */
    public function __construct(Page $page)
    {
        $config = Config::get('fully');
        $this->perPage = $config['per_page'];
        $this->page = $page;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->page->where('lang', $this->getLang())->get();
    }

    /**
     * @param $slug
     *
     * @return mixed
     */
    public function getBySlug($slug, $isPublished = false)
    {
        if ($isPublished === true) {
            return $this->page->where('slug', $slug)->where('is_published', true)->first();
        }

        return $this->page->where('slug', $slug)->first();
    }

    /**
     * @return mixed
     */
    public function lists()
    {
        return $this->page->where('lang', $this->getLang())->lists('title', 'id');
    }

    /**
     * Get paginated pages.
     *
     * @param int  $page  Number of pages per page
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

        $query = $this->page->orderBy('created_at', 'DESC')->where('lang', $this->getLang());

        if (!$all) {
            $query->where('is_published', 1);
        }

        $pages = $query->skip($limit * ($page - 1))->take($limit)->get();

        $result->totalItems = $this->totalPages($all);
        $result->items = $pages->all();

        return $result;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->page->find($id);
    }

    /**
     * @param $attributes
     *
     * @return bool|mixed
     *
     * @throws \Fully\Exceptions\Validation\ValidationException
     */
    public function create($attributes)
    {
        $attributes['is_published'] = isset($attributes['is_published']) ? true : false;

        if ($this->isValid($attributes)) {
            $this->page->lang = $this->getLang();
            $this->page->fill($attributes)->save();

            return true;
        }

        throw new ValidationException('Page validation failed', $this->getErrors());
    }

    /**
     * @param $id
     * @param $attributes
     *
     * @return bool|mixed
     *
     * @throws \Fully\Exceptions\Validation\ValidationException
     */
    public function update($id, $attributes)
    {
        $attributes['is_published'] = isset($attributes['is_published']) ? true : false;

        $this->page = $this->find($id);

        if ($this->isValid($attributes)) {
            $this->page->resluggify();
            $this->page->fill($attributes)->save();

            return true;
        }

        throw new ValidationException('Category validation failed', $this->getErrors());
    }

    /**
     * @param $id
     *
     * @return mixed|void
     */
    public function delete($id)
    {
        $this->page->findOrFail($id)->delete();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function togglePublish($id)
    {
        $page = $this->page->find($id);
        $page->is_published = ($page->is_published) ? false : true;
        $page->save();

        return Response::json(array('result' => 'success', 'changed' => ($page->is_published) ? 1 : 0));
    }

    /**
     * Get total page count.
     *
     * @param bool $all
     *
     * @return mixed
     */
    protected function totalPages($all = false)
    {
        if (!$all) {
            return $this->page->where('is_published', 1)->where('lang', $this->getLang())->count();
        }

        return $this->page->where('lang', $this->getLang())->count();
    }
}
