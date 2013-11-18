<?php

namespace App\Controllers\Admin;

use BaseController, Redirect, View, Input, Validator, Article, Response, Tag, Str;

class ArticleController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $articles = Article::orderBy('created_at', 'DESC')
            ->paginate(15);
        return View::make('backend.article.index', compact('articles'))->with('active', 'article');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        return View::make('backend.article.create')->with('active', 'article');
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
            'meta_title'       => Input::get('meta_title'),
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
        $article->meta_title = $formData['meta_title'];
        $article->meta_keywords = $formData['meta_keywords'];
        $article->meta_description = $formData['meta_description'];
        $article->is_published = ($formData['is_published']) ? true : false;
        $article->save();

        $articleTags = explode(',', $formData['tag']);

        foreach ($articleTags as $articleTag) {

            if (!$articleTag) continue;

            $tag = Tag::where('name', '=', $articleTag)->first();

            if (!$tag) $tag = new Tag;

            $tag->name = $articleTag;
            $tag->slug = Str::slug($articleTag);
            $article->tags()->save($tag);
        }

        return Redirect::action('App\Controllers\Admin\ArticleController@index')->with('message', 'Article was successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {

        $article = Article::findOrFail($id);
        return View::make('backend.article.show', compact('article'))->with('active', 'article');
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

        return View::make('backend.article.edit', compact('article', 'tags'))->with('active', 'article');
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
            'meta_title'       => Input::get('meta_title'),
            'meta_keywords'    => Input::get('meta_keywords'),
            'meta_description' => Input::get('meta_description'),
            'is_published'     => Input::get('is_published')
        );

        $article = Article::findOrFail($id);
        $article->title = $formData['title'];
        $article->slug = $formData['slug'];
        $article->content = $formData['content'];
        $article->meta_title = $formData['meta_title'];
        $article->meta_keywords = $formData['meta_keywords'];
        $article->meta_description = $formData['meta_description'];
        $article->is_published = ($formData['is_published']) ? true : false;
        $article->save();

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

        return Redirect::action('App\Controllers\Admin\ArticleController@index')->with('message', 'Article was successfully updated');;
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

        return Redirect::action('App\Controllers\Admin\ArticleController@index')->with('message', 'Article was successfully deleted');;
    }

    public function confirmDestroy($id) {

        $article = Article::findOrFail($id);
        return View::make('backend.article.confirm-destroy', compact('article'))->with('active', 'article');
    }

    public function togglePublish($id) {

        $page = Article::findOrFail($id);

        $page->is_published = ($page->is_published) ? false : true;
        $page->save();

        return Response::json(array('result' => 'success', 'changed' => ($page->is_published) ? 1 : 0));
    }
}
