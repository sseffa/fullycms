<?php

namespace Fully\Http\Controllers\Admin;

use View;
use Input;
use Flash;
use Response;
use Fully\Services\Pagination;
use Fully\Http\Controllers\Controller;
use Fully\Repositories\News\NewsInterface;
use Fully\Repositories\News\NewsRepository as News;
use Fully\Exceptions\Validation\ValidationException;

/**
 * Class NewsController.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class NewsController extends Controller
{
    protected $news;
    protected $perPage;

    public function __construct(NewsInterface $news)
    {
        View::share('active', 'modules');
        $this->news = $news;
        $this->perPage = config('fully.modules.news.per_page');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pagiData = $this->news->paginate(Input::get('page', 1), $this->perPage, true);
        $news = Pagination::makeLengthAware($pagiData->items, $pagiData->totalItems, $this->perPage);

        return view('backend.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        try {
            $this->news->create(Input::all());
            Flash::message('News was successfully added');

            return langRedirectRoute('admin.news.index');
        } catch (ValidationException $e) {
            return langRedirectRoute('admin.news.create')->withInput()->withErrors($e->getErrors());
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
        $news = $this->news->find($id);

        return view('backend.news.show', compact('news'));
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
        $news = $this->news->find($id);

        return view('backend.news.edit', compact('news'));
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
            $this->news->update($id, Input::all());
            Flash::message('News was successfully updated');

            return langRedirectRoute('admin.news.index');
        } catch (ValidationException $e) {
            return langRedirectRoute('admin.news.edit')->withInput()->withErrors($e->getErrors());
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
        $this->news->delete($id);
        Flash::message('News was successfully deleted');

        return langRedirectRoute('admin.news.index');
    }

    public function confirmDestroy($id)
    {
        $news = $this->news->find($id);

        return view('backend.news.confirm-destroy', compact('news'));
    }

    public function togglePublish($id)
    {
        return $this->news->togglePublish($id);
    }
}
