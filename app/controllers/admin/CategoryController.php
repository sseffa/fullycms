<?php

namespace App\Controllers\Admin;

use BaseController, Redirect, View, Input, Validator, Category, Response;

class CategoryController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $categories = Category::orderBy('created_at', 'DESC')
            ->paginate(15);

        return View::make('backend.category.index', compact('categories'))->with('active', 'category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        return View::make('backend.category.create')->with('active', 'category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        $formData = array(
            'title' => Input::get('title')
        );

        $rules = array(
            'title' => 'required|min:3|unique:categories'
        );

        $validation = Validator::make($formData, $rules);

        if ($validation->fails()) {
            return Redirect::action('App\Controllers\Admin\CategoryController@create')->withErrors($validation)->withInput();
        }

        $category = new Category();
        $category->title = $formData['title'];
        $category->save();

        return Redirect::action('App\Controllers\Admin\CategoryController@index')->with('message', 'Category was successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {

        $category = Category::findOrFail($id);
        return View::make('backend.category.show', compact('category'))->with('active', 'category');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {

        $category = Category::findOrFail($id);
        return View::make('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id) {

        $formData = array(
            'title' => Input::get('title')
        );

        $category = Category::findOrFail($id);
        $category->title = $formData['title'];
        $category->save();
        return Redirect::action('App\Controllers\Admin\CategoryController@index')->with('message', 'Category was successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {

        $category = Category::findOrFail($id);
        $category->delete();

        return Redirect::action('App\Controllers\Admin\CategoryController@index')->with('message', 'Category was successfully deleted');
    }

    public function confirmDestroy($id) {

        $category = Category::findOrFail($id);
        return View::make('backend.category.confirm-destroy', compact('category'))->with('active', 'category');
    }
}
