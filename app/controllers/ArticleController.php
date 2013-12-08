<?php

class ArticleController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $articles = Article::with('tags')->orderBy('created_at', 'DESC')
            ->where('is_published', 1)
            ->paginate(10);


        /*
        $articles = Cache::remember('articles', 60, function () {

            return Article::with('tags')->orderBy('created_at', 'DESC')
                ->where('is_published', 1)
                ->paginate(10)->getItems();
        });
        */

        /*
        $articles = Cache::get('articles', function () {

            $collections = Article::with('tags')->orderBy('created_at', 'DESC')
                ->where('is_published', 1)
                ->paginate(10)->getItems();
            Cache::forever('articles', $collections, 60);
            return $collections;
        });
        */

        return View::make('frontend.article.index', compact('articles'));
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id, $slug = null) {

        $article = Cache::remember('article_' . $id, 60, function () use ($id) {

            return Article::findOrFail($id);
        });

        $tags = Cache::remember('tags', 60, function () {

            return Tag::with('articles')->get();
        });

        $categories = Cache::remember('categories', 60, function () {

            return Category::with('articles')->get();
        });

        var_dump(DB::getQueryLog());

        /*
        $article = Article::findOrFail($id);
        $tags = Tag::with('articles')->get();
        $categories = Category::with('articles')->get();
        */

        echo DB::getQueryLog();

        return View::make('frontend.article.show', compact('article', 'tags', 'categories'));
    }
}
