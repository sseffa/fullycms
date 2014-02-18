<?php namespace Sefa\Repositories\Page;

use Page;
use Config;
use Response;
use Sefa\Repositories\BaseRepositoryInterface as BaseRepositoryInterface;
use Sefa\Exceptions\Validation\ValidationException;
use Sefa\Repositories\AbstractValidator as Validator;

class PageRepository extends Validator implements BaseRepositoryInterface {

    protected $perPage;
    protected $page;

    /**
     * Rules
     *
     * @var array
     */
    protected static $rules = [
        'title'   => 'required|min:3',
        'content' => 'required|min:5'
    ];

    public function __construct(Page $page) {

        $config = Config::get('sfcms');
        $this->perPage = $config['modules']['per_page'];
        $this->page = $page;
    }

    public function all() {

        return $this->page->get();
    }

    public function lists() {

        return $this->page->get()->lists('title', 'id');
    }

    public function paginate($perPage = null) {

        return $this->page->paginate(($perPage) ? $perPage : $this->perPage);
    }

    public function find($id) {

        return $this->page->findOrFail($id);
    }

    public function create($attributes) {

        $attributes['is_published'] = isset($attributes['is_published']) ? true : false;

        if ($this->isValid($attributes)) {

            $this->page->fill($attributes)->save();
            return true;
        }

        throw new ValidationException('Page validation failed', $this->getErrors());
    }

    public function update($id, $attributes) {

        $attributes['is_published'] = isset($attributes['is_published']) ? true : false;

        $this->page = $this->find($id);

        if ($this->isValid($attributes)) {

            $this->page->fill($attributes)->save();
            return true;
        }

        throw new ValidationException('Category validation failed', $this->getErrors());
    }

    public function destroy($id) {

        $this->page->findOrFail($id)->delete();
    }

    public function togglePublish($id) {

        $page = $this->page->find($id);
        $page->is_published = ($page->is_published) ? false : true;
        $page->save();
        return Response::json(array('result' => 'success', 'changed' => ($page->is_published) ? 1 : 0));
    }
}
