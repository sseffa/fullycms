<?php

namespace App\Controllers\Admin;

use BaseController, Redirect, View, Input, Validator, FormPost, Response;

class FormPostController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $formPosts = FormPost::orderBy('created_at', 'DESC')
            ->paginate(15);

        return View::make('backend.form_post.index', compact('formPosts'))->with('active', 'form-post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {

        $formPost = FormPost::findOrFail($id);
        return View::make('backend.form_post.show', compact('formPost'))->with('active', 'form-post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {

        $formPost = FormPost::findOrFail($id);
        $formPost->delete();

        return Redirect::action('App\Controllers\Admin\FormPostController@index')->with('message', 'Post was successfully deleted');
    }

    public function confirmDestroy($id) {

        $formPost = FormPost::findOrFail($id);
        return View::make('backend.form_post.confirm-destroy', compact('formPost'))->with('active', 'form-post');
    }
}
