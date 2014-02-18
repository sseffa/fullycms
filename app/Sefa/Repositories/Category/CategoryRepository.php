<?php namespace Sefa\Repositories\Category;

use Config;
use Category;
use Sefa\Repositories\BaseRepositoryInterface as BaseRepositoryInterface;
use Sefa\Exceptions\Validation\ValidationException;
use Sefa\Repositories\AbstractValidator as Validator;

class CategoryRepository extends Validator implements BaseRepositoryInterface {

    protected $perPage;
    protected $category;

    /**
     * Rules
     *
     * @var array
     */
    protected static $rules = [
        'title' => 'required|min:3|unique:categories'
    ];

    public function __construct(Category $category) {

        $this->category = $category;
        $config = Config::get('sfcms');
        $this->perPage = $config['modules']['per_page'];
    }

    public function all() {

        return $this->category->get();
    }

    public function paginate($perPage = null) {

        return $this->category->paginate(($perPage) ? $perPage : $this->perPage);
    }

    public function lists() {

        return $this->category->lists('title', 'id');
    }

    public function find($id) {

        return $this->category->findOrFail($id);
    }

    public function getArticlesByTitle($title) {

        return $this->category->where('title', '=', $title)->first()->articles()->paginate($this->perPage);
    }

    public function create($attributes) {

        if ($this->isValid($attributes)) {

            $this->category->fill($attributes)->save();
            return true;
        }

        throw new ValidationException('Category validation failed', $this->getErrors());
    }

    public function update($id, $attributes) {

        $this->category = $this->find($id);

        if ($this->isValid($attributes)) {

            $this->category->fill($attributes)->save();
            return true;
        }

        throw new ValidationException('Category validation failed', $this->getErrors());
    }

    public function destroy($id) {

        $category = $this->category->find($id);
        $category->articles()->delete($id);
        $category->delete();
    }
}