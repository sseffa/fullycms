<?php

use Sefa\Repositories\Article\ArticleRepository as Article;
use Sefa\Repositories\Category\CategoryRepository as Category;
use Sefa\Repositories\Tag\TagRepository as Tag;

class ArticleController extends BaseController {

    protected $article;

    public function __construct(Article $article, Tag $tag, Category $category) {

        $this->article = $article;
        $this->tag = $tag;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $articles = $this->article->paginate();
        return View::make('frontend.article.index', compact('articles'));
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id, $slug = null) {

        $article = $this->article->find($id);     
        $categories=$this->category->all();
        $tags=$this->tag->all();
        return View::make('frontend.article.show', compact('article', 'categories', 'tags'));
    }
}
