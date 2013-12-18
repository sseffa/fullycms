<?php

namespace App\Controllers\Admin;

use BaseController, Redirect, View, Input, Category, Response;

class CategoryController extends BaseController {

    protected $category;

    public function __construct(Category $category) {

        $this->category = $category;
        View::share('active', 'blog');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $categories = $this->category->paginate(15);

        return View::make('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        return View::make('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        $input = Input::all();

        if (!$this->category->fill($input)->isValid()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($this->category->errors);
        }

        $this->category->save();

        return Redirect::route('admin.category.index')
            ->with('message', 'Category was successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {

        $category = $this->category->findOrFail($id);
        return View::make('backend.category.show', compact('category'));
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

        $this->category = Category::find($id);

        $input = Input::all();

        if (!$this->category->fill($input)->isValid()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($this->category->errors);
        }

        $this->category->save();

        return Redirect::route('admin.category.index')
            ->with('message', 'Category was successfully updated');
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

        return Redirect::route('admin.category.index')
            ->with('message', 'Category was successfully deleted');
    }

    public function confirmDestroy($id) {

        $category = Category::findOrFail($id);
        return View::make('backend.category.confirm-destroy', compact('category'));
    }
}
