<?php

namespace Fully\Http\Controllers;

use Fully\Repositories\Tag\TagInterface;
use Fully\Repositories\Tag\TagRepository as Tag;
use Fully\Repositories\Category\CategoryInterface;

/**
 * Class TagController.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class TagController extends Controller
{
    protected $tag;
    protected $category;

    public function __construct(TagInterface $tag, CategoryInterface $category)
    {
        $this->tag = $tag;
        $this->category = $category;
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($slug)
    {
        $articles = $this->tag->getArticlesBySlug($slug);
        $categories = $this->category->all();
        $tags = $this->tag->all();

        return view('frontend.tag.index', compact('articles', 'tags', 'categories'));
    }
}
