<?php

class NewsController extends BaseController {

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

        $news = News::orderBy('created_at', 'DESC')
            ->where('is_published', 1)
            ->paginate($this->perPage);

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
