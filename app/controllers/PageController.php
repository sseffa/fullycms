<?php

class PageController extends BaseController {

    /**
     * Display page
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id) {

        $page = Page::findOrFail($id);
        return View::make('frontend.page.show', compact('page'));
    }
}
