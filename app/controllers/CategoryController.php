<?php

class CategoryController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($category) {

        $category = Category::where('title', '=', $category)->first();
        $articles = $category->articles()->paginate(10);
        $tags = Tag::with('articles')->get();
        $categories = Category::with('articles')->get();

        return View::make('frontend.category.index', compact('articles', 'tags', 'categories'));
    }
}
