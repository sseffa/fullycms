<?php namespace App\Controllers\Admin;

use BaseController;
use Redirect;
use View;
use Input;
use Response;
use Tag;
use Str;
use Notification;
use Sefa\Repositories\Article\ArticleRepository as Article;
use Sefa\Repositories\Category\CategoryRepository as Category;
use Sefa\Exceptions\Validation\ValidationException;

class ArticleController extends BaseController {

    protected $article;
    protected $category;

    public function __construct(Article $article, Category $category) {

        View::share('active', 'blog');
        $this->article = $article;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $articles = $this->article->paginate(null, true);
        return View::make('backend.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        $categories = $this->category->lists();
        return View::make('backend.article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        try {
            $this->article->create(Input::all());
            Notification::success('Article was successfully added');
            return Redirect::route('admin.article.index');
        } catch (ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {

        $article = $this->article->find($id);
        return View::make('backend.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {

        $article = $this->article->find($id);
        $tags = null;

        foreach ($article->tags as $tag) {
            $tags .= ',' . $tag->name;
        }

        $tags = substr($tags, 1);
        $categories = $this->category->lists();
        return View::make('backend.article.edit', compact('article', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id) {

        try {
            $this->article->update($id, Input::all());
            Notification::success('Article was successfully updated');
            return Redirect::route('admin.article.index');
        } catch (ValidationException $e) {

            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {

        $this->article->destroy($id);
        Notification::success('Article was successfully deleted');
        return Redirect::action('App\Controllers\Admin\ArticleController@index');
    }

    public function confirmDestroy($id) {

        $article = $this->article->find($id);
        return View::make('backend.article.confirm-destroy', compact('article'));
    }

    public function togglePublish($id) {

        return $this->article->togglePublish($id);
    }
}
