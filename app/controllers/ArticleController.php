<?php

class ArticleController extends BaseController {

    protected $perPage;

    public function __construct(){

        $config = Config::get('sfcms');
        $this->perPage=$config['modules']['per_page'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $articles = Article::with('tags')->orderBy('created_at', 'DESC')
            ->where('is_published', 1)
            ->paginate($this->perPage);

        return View::make('frontend.article.index', compact('articles'));
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id, $slug = null) {

        $article = Article::findOrFail($id);
        $tags = Tag::with('articles')->get();
        $categories = Category::with('articles')->get();

        return View::make('frontend.article.show', compact('article', 'tags', 'categories'));
    }
}
