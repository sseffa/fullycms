<?php

use Sefa\Repository\Tag\TagRepository as Tag;

class TagController extends BaseController {

    protected $tag;

    public function __construct(Tag $tag) {

        $this->tag = $tag;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($slug) {

        $articles = $this->tag->bySlug($slug);
        return View::make('frontend.tag.index', compact('articles'));
    }
}
