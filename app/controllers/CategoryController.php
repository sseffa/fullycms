<?php

use Sefa\Repositories\Category\CategoryRepository as Category;

class CategoryController extends BaseController {

    protected $category;

    public function __construct(Category $category) {

        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($title) {

        $articles = $this->category->getArticlesByTitle($title);
        return View::make('frontend.category.index', compact('articles'));
    }
}
