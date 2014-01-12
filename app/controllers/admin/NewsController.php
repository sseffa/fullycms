<?php

namespace App\Controllers\Admin;

use BaseController;
use Redirect;
use View;
use Input;
use Validator;
use Response;
use Str;
use Notification;
use Sefa\Repositories\News\NewsRepository as News;
use Sefa\Exceptions\Validation\ValidationException;

class NewsController extends BaseController {

    protected $news;

    public function __construct(News $news) {

        View::share('active', 'modules');
        $this->news = $news;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $news = $this->news->paginate();
        return View::make('backend.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        return View::make('backend.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        try {
            $this->news->create(Input::all());
            Notification::success('News was successfully added');
            return Redirect::route('admin.news.index');
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

        $news = $this->news->find($id);
        return View::make('backend.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {

        $news = $this->news->find($id);
        return View::make('backend.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id) {

        try {
            $this->news->update($id, Input::all());
            Notification::success('News was successfully updated');
            return Redirect::route('admin.news.index');
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

        $this->news->destroy($id);
        Notification::success('News was successfully deleted');
        return Redirect::action('App\Controllers\Admin\NewsController@index');
    }

    public function confirmDestroy($id) {

        $news = $this->news->find($id);
        return View::make('backend.news.confirm-destroy', compact('news'));
    }

    public function togglePublish($id) {

        return $this->news->togglePublish($id);
    }
}
