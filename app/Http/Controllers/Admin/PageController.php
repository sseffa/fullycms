<?php namespace Fully\Http\Controllers\Admin;

use Fully\Http\Controllers\Controller;
use Fully\Repositories\Page\PageInterface;
use Redirect;
use View;
use Input;
use Validator;
use Response;
use Flash;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Fully\Repositories\Page\PageRepository as Page;
use Fully\Exceptions\Validation\ValidationException;

/**
 * Class PageController
 * @package App\Controllers\Admin
 * @author Sefa Karagöz
 */
class PageController extends Controller
{
    protected $page;

    public function __construct(PageInterface $page)
    {

        $this->page = $page;
        View::share('active', 'modules');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $page = Input::get('page', 1);
        $perPage = 10;
        $pagiData = $this->page->paginate($page, $perPage, true);
        $pages = new LengthAwarePaginator($pagiData->items, $pagiData->totalItems, $perPage, [
            'path' => Paginator::resolveCurrentPath()
        ]);

        $pages->setPath("");

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

        try
        {
            $this->page->create(Input::all());
            Flash::message('Page was successfully added');
            return langRedirectRoute('admin.page.index');
        } catch(ValidationException $e)
        {
            return langRedirectRoute('admin.page.create')->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
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
     * @param  int $id
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
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {

        try
        {
            $this->page->update($id, Input::all());
            Flash::message('Page was successfully updated');
            return langRedirectRoute('admin.page.index');
        } catch(ValidationException $e)
        {
            return langRedirectRoute('admin.page.edit')->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
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
