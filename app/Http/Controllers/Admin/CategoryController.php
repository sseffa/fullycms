<?php

namespace Fully\Http\Controllers\Admin;

use View;
use Input;
use Flash;
use Fully\Services\Pagination;
use Fully\Http\Controllers\Controller;
use Fully\Repositories\Category\CategoryInterface;
use Fully\Exceptions\Validation\ValidationException;
use Fully\Repositories\Category\CategoryRepository as Category;

/**
 * Class CategoryController.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class CategoryController extends Controller
{
    protected $category;
    protected $perPage;

    public function __construct(CategoryInterface $category)
    {
        $this->category = $category;
        View::share('active', 'blog');
        $this->perPage = config('fully.modules.category.per_page');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pagiData = $this->category->paginate(Input::get('page', 1), $this->perPage, true);
        $categories = Pagination::makeLengthAware($pagiData->items, $pagiData->totalItems, $this->perPage);

        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        try {
            $this->category->create(Input::all());
            Flash::message('Category was successfully added');

            return langRedirectRoute('admin.category.index');
        } catch (ValidationException $e) {
            return langRedirectRoute('admin.category.create')->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $category = $this->category->find($id);

        return view('backend.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->category->find($id);

        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id)
    {
        try {
            $this->category->update($id, Input::all());
            Flash::message('Category was successfully updated');

            return langRedirectRoute('admin.category.index');
        } catch (ValidationException $e) {
            return langRedirectRoute('admin.category.edit')->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $this->category->delete($id);
        Flash::message('Category was successfully deleted');

        return langRedirectRoute('admin.category.index');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function confirmDestroy($id)
    {
        $category = $this->category->find($id);

        return view('backend.category.confirm-destroy', compact('category'));
    }
}
