<?php

namespace Fully\Http\Controllers\Admin;

use View;
use Flash;
use Input;
use Response;
use Fully\Services\Pagination;
use Fully\Http\Controllers\Controller;
use Fully\Repositories\Article\ArticleInterface;
use Fully\Repositories\Category\CategoryInterface;
use Fully\Exceptions\Validation\ValidationException;
use Fully\Repositories\Article\ArticleRepository as Article;
use Fully\Repositories\Category\CategoryRepository as Category;

/**
 * Class ArticleController.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class ArticleController extends Controller
{
    protected $article;
    protected $category;
    protected $perPage;

    public function __construct(ArticleInterface $article, CategoryInterface $category)
    {
        View::share('active', 'blog');
        $this->article = $article;
        $this->category = $category;

        $this->perPage = config('fully.modules.article.per_page');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pagiData = $this->article->paginate(Input::get('page', 1), $this->perPage, true);
        $articles = Pagination::makeLengthAware($pagiData->items, $pagiData->totalItems, $this->perPage);

        return view('backend.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->category->lists();

        return view('backend.article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        try {
            $this->article->create(Input::all());
            Flash::message('Article was successfully added');

            return langRedirectRoute('admin.article.index');
        } catch (ValidationException $e) {
            return langRedirectRoute('admin.article.create')->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $article = $this->article->find($id);

        return view('backend.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $article = $this->article->find($id);
        $tags = null;

        foreach ($article->tags as $tag) {
            $tags .= ','.$tag->name;
        }

        $tags = substr($tags, 1);
        $categories = $this->category->lists();

        return view('backend.article.edit', compact('article', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id)
    {
        try {
            $this->article->update($id, Input::all());
            Flash::message('Article was successfully updated');

            return langRedirectRoute('admin.article.index');
        } catch (ValidationException $e) {
            return langRedirectRoute('admin.article.edit')->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->article->delete($id);
        Flash::message('Article was successfully deleted');

        return langRedirectRoute('admin.article.index');
    }

    public function confirmDestroy($id)
    {
        $article = $this->article->find($id);

        return view('backend.article.confirm-destroy', compact('article'));
    }

    public function togglePublish($id)
    {
        return $this->article->togglePublish($id);
    }
}
