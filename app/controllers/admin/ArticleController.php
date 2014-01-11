<?php

namespace App\Controllers\Admin;

use BaseController;
use Redirect; View; 
use Input; 
use Validator; 
use Article; 
use Category; 
use Response; 
use Tag; Str; 
use Notification;

class ArticleController extends BaseController {

    public function __construct() {

        View::share('active', 'blog');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        $categories = Category::lists('title', 'id');
        return View::make('backend.article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        $formData = array(
            'title'            => Input::get('title'),
            'slug'             => Input::get('slug'),
            'tag'              => Input::get('tag'),
            'content'          => Input::get('content'),
            'category'         => Input::get('category'),
            'meta_keywords'    => Input::get('meta_keywords'),
            'meta_description' => Input::get('meta_description'),
            'is_published'     => Input::get('is_published')
        );

        $rules = array(
            'title'   => 'required',
            'content' => 'required'
        );

        $validation = Validator::make($formData, $rules);

        if ($validation->fails()) {
            return Redirect::action('App\Controllers\Admin\ArticleController@create')->withErrors($validation)->withInput();
        }

        $article = new Article();
        $article->title = $formData['title'];
        $article->slug = $formData['slug'];
        $article->content = $formData['content'];
        $article->meta_keywords = $formData['meta_keywords'];
        $article->meta_description = $formData['meta_description'];
        $article->is_published = ($formData['is_published']) ? true : false;

        if ($article->save()) {

            $category = Category::find($formData['category']);
            $category->articles()->save($article);
        }

        $articleTags = explode(',', $formData['tag']);

        foreach ($articleTags as $articleTag) {

            if (!$articleTag) continue;

            $tag = Tag::where('name', '=', $articleTag)->first();

            if (!$tag) $tag = new Tag;

            $tag->name = $articleTag;
            $tag->slug = Str::slug($articleTag);
            $article->tags()->save($tag);
        }

        Notification::success('Article was successfully added');

        return Redirect::action('App\Controllers\Admin\ArticleController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {

        $article = Article::findOrFail($id);
        return View::make('backend.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {

        $article = Article::findOrFail($id);

        $tags = null;
        foreach ($article->tags as $tag) {
            $tags .= ',' . $tag->name;
        }
        $tags = substr($tags, 1);

        $categories = Category::lists('title', 'id');

        return View::make('backend.article.edit', compact('article', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id) {

        $formData = array(
            'title'            => Input::get('title'),
            'slug'             => Input::get('slug'),
            'tag'              => Input::get('tag'),
            'content'          => Input::get('content'),
            'category'         => Input::get('category'),
            'meta_keywords'    => Input::get('meta_keywords'),
            'meta_description' => Input::get('meta_description'),
            'is_published'     => Input::get('is_published')
        );

        $article = Article::findOrFail($id);
        $article->title = $formData['title'];
        $article->slug = $formData['slug'];
        $article->content = $formData['content'];
        $article->meta_keywords = $formData['meta_keywords'];
        $article->meta_description = $formData['meta_description'];
        $article->is_published = ($formData['is_published']) ? true : false;

        if ($article->save()) {

            $category = Category::find($formData['category']);
            $category->articles()->save($article);
        }

        $articleTags = explode(',', $formData['tag']);

        $article->tags()->detach();
        foreach ($articleTags as $articleTag) {

            if (!$articleTag) continue;

            $tag = Tag::where('name', '=', $articleTag)->first();

            if (!$tag) $tag = new Tag;

            $tag->name = $articleTag;
            $tag->slug = Str::slug($articleTag);
            $article->tags()->save($tag);
        }

        Notification::success('Article was successfully updated');

        return Redirect::action('App\Controllers\Admin\ArticleController@index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $articles = Article::orderBy('created_at', 'DESC')
            ->paginate(10);

        return View::make('backend.article.index', compact('articles'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {

        $article = Article::findOrFail($id);
        $article->tags()->detach();
        $article->delete();

        Notification::success('Article was successfully deleted');

        return Redirect::action('App\Controllers\Admin\ArticleController@index');
    }

    public function confirmDestroy($id) {

        $article = Article::findOrFail($id);
        return View::make('backend.article.confirm-destroy', compact('article'));
    }

    public function togglePublish($id) {

        $page = Article::findOrFail($id);

        $page->is_published = ($page->is_published) ? false : true;
        $page->save();

        return Response::json(array('result' => 'success', 'changed' => ($page->is_published) ? 1 : 0));
    }
}
