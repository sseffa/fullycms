<?php

use Sefa\Repositories\News\NewsRepository as News;

class NewsController extends BaseController {

    protected $news;

    public function __construct(News $news) {

        $this->news = $news;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $news = $this->news->paginate();
        return View::make('frontend.news.index', compact('news'));
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id, $slug = null) {

        $news = $this->news->find($id);
        return View::make('frontend.news.show', compact('news'));
    }
}
