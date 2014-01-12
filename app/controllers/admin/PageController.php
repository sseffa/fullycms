<?php

namespace App\Controllers\Admin;

use BaseController;
use Redirect;
use View;
use Input;
use Validator;
use Response;
use Notification;
use Sefa\Repositories\Page\PageRepository as Page;
use Sefa\Exceptions\Validation\ValidationException;

class PageController extends BaseController {

    protected $page;

    public function __construct(Page $page) {

        $this->page = $page;
        View::share('active', 'modules');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $pages = $this->page->paginate();
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

        try {
            $this->page->create(Input::all());
            Notification::success('Page was successfully added');
            return Redirect::route('admin.page.index');
        } catch (ValidationException $e) {

            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {

        $page = $this->page->find($id);
        return View::make('backend.page.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {

        $page = $this->page->find($id);
        return View::make('backend.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id) {

        try {
            $this->page->update($id, Input::all());
            Notification::success('Page was successfully updated');
            return Redirect::route('admin.page.index');
        } catch (ValidationException $e) {

            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {

        $this->page->destroy($id);
        Notification::success('Page was successfully deleted');
        return Redirect::action('App\Controllers\Admin\PageController@index');
    }

    public function confirmDestroy($id) {

        $page = $this->page->find($id);
        return View::make('backend.page.confirm-destroy', compact('page'));
    }

    public function togglePublish($id) {

        return $this->page->togglePublish($id);
    }

    public function toggleMenu($id) {

        return $this->page->toggleMenu($id);
    }
}
