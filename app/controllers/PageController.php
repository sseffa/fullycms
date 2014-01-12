<?php

use Sefa\Repository\Page\PageRepository as Page;

class PageController extends BaseController {

    protected $page;

    public function __construct(Page $page) {

        $this->page = $page;
    }

    /**
     * Display page
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id) {

        $page = $this->page->find($id);
        return View::make('frontend.page.show', compact('page'));
    }
}
