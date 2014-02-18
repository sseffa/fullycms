<?php

class SearchController extends BaseController {

    public function index() {

        $q = Input::get('search');

        View::composer('frontend/_layout/menu', function ($view) use ($q) {

            $view->with('q', $q);
        });

        $result = Search::search($q);
        $paginator = Paginator::make($result, count($result), 10);
        return View::make('frontend.search.index', compact('paginator', 'q'));
    }
}
