<?php

class ArticleController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $articles = DB::table('articles')
                        ->where('is_published', 1)
                        ->paginate(15);

        return View::make('frontend.article.index', compact('articles'));
    }

    public function show($id) {

        $article = Article::find($id);
        return View::make('frontend.article.show', compact('article'));
    }
}
