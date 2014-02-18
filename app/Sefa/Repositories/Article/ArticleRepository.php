<?php namespace Sefa\Repositories\Article;

use Article;
use Config;
use Response;
use Tag;
use Category;
use Str;
use Event;
use Sefa\Repositories\BaseRepositoryInterface as BaseRepositoryInterface;
use Sefa\Exceptions\Validation\ValidationException;
use Sefa\Repositories\AbstractValidator as Validator;

class ArticleRepository extends Validator implements BaseRepositoryInterface {

    protected $perPage;
    protected $article;

    /**
     * Rules
     *
     * @var array
     */
    protected static $rules = [
        'title'   => 'required',
        'content' => 'required'
    ];

    public function __construct(Article $article) {

        $config = Config::get('sfcms');
        $this->perPage = $config['modules']['per_page'];
        $this->article = $article;
    }

    public function all() {

        return $this->article->with('tags')->orderBy('created_at', 'DESC')
            ->where('is_published', 1)
            ->get();
    }

    public function lists() {

        return $this->article->get()->lists('title', 'id');
    }

    public function paginate($perPage = null, $all=false) {

        if($all)
             return $this->article->with('tags')->orderBy('created_at', 'DESC')
            ->paginate(($perPage) ? $perPage : $this->perPage);

        return $this->article->with('tags')->orderBy('created_at', 'DESC')
            ->where('is_published', 1)
            ->paginate(($perPage) ? $perPage : $this->perPage);
    }

    public function find($id) {

        return $this->article->with(['tags', 'category'])->findOrFail($id);
    }

    public function create($attributes) {

        $attributes['is_published'] = isset($attributes['is_published']) ? true : false;

        if ($this->isValid($attributes)) {

            if ($this->article->fill($attributes)->save()) {

                $category = Category::find($attributes['category']);
                $category->articles()->save($this->article);
            }

            $articleTags = explode(',', $attributes['tag']);

            foreach ($articleTags as $articleTag) {

                if (!$articleTag) continue;

                $tag = Tag::where('name', '=', $articleTag)->first();

                if (!$tag) $tag = new Tag;

                $tag->name = $articleTag;
                $tag->slug = Str::slug($articleTag);
                $this->article->tags()->save($tag);
            }

            //Event::fire('article.created', $this->article);
            Event::fire('article.creating', $this->article);
            return true;
        }

        throw new ValidationException('Article validation failed', $this->getErrors());
    }

    public function update($id, $attributes) {

        $this->article = $this->find($id);
        $attributes['is_published'] = isset($attributes['is_published']) ? true : false;

        if ($this->isValid($attributes)) {

            if ($this->article->fill($attributes)->save()) {

                $category = Category::find($attributes['category']);
                $category->articles()->save($this->article);
            }

            $articleTags = explode(',', $attributes['tag']);

            foreach ($articleTags as $articleTag) {

                if (!$articleTag) continue;

                $tag = Tag::where('name', '=', $articleTag)->first();

                if (!$tag) $tag = new Tag;

                $tag->name = $articleTag;
                $tag->slug = Str::slug($articleTag);
                $this->article->tags()->save($tag);
            }

            return true;
        }

        throw new ValidationException('Article validation failed', $this->getErrors());
    }

    public function destroy($id) {

        $article = $this->article->findOrFail($id);
        $article->tags()->detach();
        $article->delete();
    }

    public function togglePublish($id) {

        $page = $this->article->find($id);

        $page->is_published = ($page->is_published) ? false : true;
        $page->save();

        return Response::json(array('result' => 'success', 'changed' => ($page->is_published) ? 1 : 0));
    }

    function getUrl($id) {

        $article = $this->article->findOrFail($id);
        return url('article/' . $id . '/' . $article->slug, $parameters = array(), $secure = null);
    }
}
