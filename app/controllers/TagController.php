<?php

class TagController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($tag) {

        $tag = Tag::where('name', '=', $tag)->first();
        $articles = $tag->articles()->paginate(10);

        $tags = Tag::with('articles')->get();

        return View::make('frontend.tag.index', compact('articles', 'tags'));
    }
}
