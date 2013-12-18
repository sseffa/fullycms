<?php

namespace App\Controllers\Admin;

use BaseController, Redirect, View, Input, Validator, Page, Response;

class PageController extends BaseController {

    public function __construct() {

        View::share('active', 'modules');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $pages = Page::orderBy('created_at', 'DESC')
            ->paginate(15);

        return View::make('backend.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        return View::make('backend.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        $formData = array(
            'title'        => Input::get('title'),
            'content'      => Input::get('content'),
            'is_published' => Input::get('is_published'),
            'is_in_menu'   => Input::get('is_in_menu')
        );

        $rules = array(
            'title'   => 'required',
            'content' => 'required'
        );

        $validation = Validator::make($formData, $rules);

        if ($validation->fails()) {
            return Redirect::action('App\Controllers\Admin\PageController@create')->withErrors($validation)->withInput();
        }

        $page = new Page();
        $page->title = $formData['title'];
        $page->content = $formData['content'];
        $page->is_published = ($formData['is_published']) ? true : false;
        $page->is_in_menu = ($formData['is_in_menu']) ? true : false;
        $page->save();

        return Redirect::action('App\Controllers\Admin\PageController@index')->with('message', 'Page was successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {

        $page = Page::findOrFail($id);
        return View::make('backend.page.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {

        $page = Page::findOrFail($id);
        return View::make('backend.page.edit', compact('page'));
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
            'content'      => Input::get('content'),
            'is_published' => Input::get('is_published'),
            'is_in_menu'   => Input::get('is_in_menu')
        );

        $page = Page::findOrFail($id);
        $page->title = $formData['title'];
        $page->content = $formData['content'];
        $page->is_published = ($formData['is_published']) ? true : false;
        $page->is_in_menu = ($formData['is_in_menu']) ? true : false;

        $page->save();
        return Redirect::action('App\Controllers\Admin\PageController@index')->with('message', 'Page was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {

        $page = Page::findOrFail($id);
        $page->delete();

        return Redirect::action('App\Controllers\Admin\PageController@index')->with('message', 'Page was successfully deleted');
    }

    public function confirmDestroy($id) {

        $page = Page::findOrFail($id);
        return View::make('backend.page.confirm-destroy', compact('page'));
    }

    public function togglePublish($id) {

        $page = Page::find($id);

        $page->is_published = ($page->is_published) ? false : true;
        $page->save();

        return Response::json(array('result' => 'success', 'changed' => ($page->is_published) ? 1 : 0));
    }

    public function toggleMenu($id) {

        $page = Page::findOrFail($id);

        $page->is_in_menu = ($page->is_in_menu) ? false : true;
        $page->save();

        return Response::json(array('result' => 'success', 'changed' => ($page->is_in_menu) ? 1 : 0));
    }
}
