<?php

class NewsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $news = News::orderBy('created_at', 'DESC')
            ->where('is_published', 1)
            ->paginate(10);

        return View::make('frontend.news.index', compact('news'));
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id, $slug = null) {

        $news = News::findOrFail($id);

        return View::make('frontend.news.show', compact('news'));
    }
}
