<?php

namespace Fully\Http\Controllers\Admin;

use View;
use Input;
use Flash;
use Response;
use Fully\Services\Pagination;
use Fully\Http\Controllers\Controller;
use Fully\Repositories\Page\PageInterface;
use Fully\Repositories\Page\PageRepository as Page;
use Fully\Exceptions\Validation\ValidationException;

/**
 * Class PageController.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class PageController extends Controller
{
    protected $page;
    protected $perPage;

    public function __construct(PageInterface $page)
    {
        View::share('active', 'modules');

        $this->page = $page;
        $this->perPage = config('fully.per_page');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pagiData = $this->page->paginate(Input::get('page', 1), $this->perPage, true);
        $pages = Pagination::makeLengthAware($pagiData->items, $pagiData->totalItems, $this->perPage);

        return view('backend.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        try {
            $this->page->create(Input::all());
            Flash::message('Page was successfully added');

            return langRedirectRoute('admin.page.index');
        } catch (ValidationException $e) {
            return langRedirectRoute('admin.page.create')->withInput()->withErrors($e->getErrors());
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
        $page = $this->page->find($id);

        return view('backend.page.show', compact('page'));
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
        $page = $this->page->find($id);

        return view('backend.page.edit', compact('page'));
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
            $this->page->update($id, Input::all());
            Flash::message('Page was successfully updated');

            return langRedirectRoute('admin.page.index');
        } catch (ValidationException $e) {
            return langRedirectRoute('admin.page.edit')->withInput()->withErrors($e->getErrors());
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
        $this->page->delete($id);
        Flash::message('Page was successfully deleted');

        return langRedirectRoute('admin.page.index');
    }

    public function confirmDestroy($id)
    {
        $page = $this->page->find($id);

        return view('backend.page.confirm-destroy', compact('page'));
    }

    public function togglePublish($id)
    {
        return $this->page->togglePublish($id);
    }
}
