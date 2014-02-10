<?php namespace App\Controllers\Admin;

use BaseController;
use Redirect;
use View;
use Input;
use Notification;
use Sefa\Repositories\Category\CategoryRepository as Category;
use Sefa\Exceptions\Validation\ValidationException;

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

        $categories = $this->category->paginate();
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

        try {
            $this->category->create(Input::all());
            Notification::success('Category was successfully added');
            return Redirect::route('admin.category.index');
        } catch (ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id) {

        $category = $this->category->find($id);
        return View::make('backend.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id) {

        $category = $this->category->find($id);
        return View::make('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return Response
     */
    public function update($id) {

        try {
            $this->category->update($id, Input::all());
            Notification::success('Category was successfully updated');
            return Redirect::route('admin.category.index');
        } catch (ValidationException $e) {

            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id) {

        $this->category->destroy($id);
        Notification::success('Category was successfully deleted');
        return Redirect::route('admin.category.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function confirmDestroy($id) {

        $category = $this->category->find($id);
        return View::make('backend.category.confirm-destroy', compact('category'));
    }
}
