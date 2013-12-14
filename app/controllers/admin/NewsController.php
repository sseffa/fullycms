<?php

namespace App\Controllers\Admin;

use BaseController, Redirect, View, Input, Validator, News, Response, Str, Notification;

class NewsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $news = News::orderBy('created_at', 'DESC')
            ->paginate(10);

        return View::make('backend.news.index', compact('news'))->with('active', 'news');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        return View::make('backend.news.create')->with('active', 'news');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        $formData = array(
            'title'        => Input::get('title'),
            'slug'         => Input::get('slug'),
            'content'      => Input::get('content'),
            'datetime'     => Input::get('datetime'),
            'is_published' => Input::get('is_published')
        );

        $rules = array(
            'title'    => 'required',
            'content'  => 'required',
            'slug'     => 'required',
            'datetime' => 'required|date',
        );

        $validation = Validator::make($formData, $rules);

        if ($validation->fails()) {
            return Redirect::action('App\Controllers\Admin\NewsController@create')->withErrors($validation)->withInput();
        }

        $news = new News();
        $news->title = $formData['title'];
        $news->slug = $formData['slug'];
        $news->content = $formData['content'];
        $news->datetime = $formData['datetime'];
        $news->is_published = ($formData['is_published']) ? true : false;
        $news->save();

        Notification::success('News was successfully added');

        return Redirect::action('App\Controllers\Admin\NewsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {

        $news = News::findOrFail($id);
        return View::make('backend.news.show', compact('news'))->with('active', 'news');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {

        $news = News::findOrFail($id);
        return View::make('backend.news.edit', compact('news'))->with('active', 'news');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id) {

        $formData = array(
            'title'        => Input::get('title'),
            'slug'         => Input::get('slug'),
            'content'      => Input::get('content'),
            'datetime'     => Input::get('datetime'),
            'is_published' => Input::get('is_published')
        );

        $news = News::findOrFail($id);
        $news->title = $formData['title'];
        $news->slug = $formData['slug'];
        $news->content = $formData['content'];
        $news->datetime = $formData['datetime'];
        $news->is_published = ($formData['is_published']) ? true : false;
        $news->save();

        return Redirect::action('App\Controllers\Admin\NewsController@index')->with('message', 'News was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {

        $news = News::findOrFail($id);
        $news->delete();

        return Redirect::action('App\Controllers\Admin\NewsController@index')->with('message', 'News was successfully deleted');
    }

    public function confirmDestroy($id) {

        $news = News::findOrFail($id);
        return View::make('backend.news.confirm-destroy', compact('news'))->with('active', 'news');
    }

    public function togglePublish($id) {

        $news = News::findOrFail($id);
        $news->is_published = ($news->is_published) ? false : true;
        $news->save();

        return Response::json(array('result' => 'success', 'changed' => ($news->is_published) ? 1 : 0));
    }
}
