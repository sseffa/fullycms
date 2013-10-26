<?php

class PageController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $pages = DB::table('pages')->paginate(15);
        return View::make('frontend.page.index', compact('pages'));
    }

    public function show($id) {

        $page = Page::find($id);
        return View::make('frontend.page.show', compact('page'));
    }
}
