<?php

namespace Fully\Http\Controllers\Admin;

use View;
use Input;
use Flash;
use Fully\Services\Pagination;
use Fully\Http\Controllers\Controller;
use Fully\Repositories\Faq\FaqInterface;
use Fully\Repositories\Faq\FaqRepository as Faq;
use Fully\Exceptions\Validation\ValidationException;

/**
 * Class FaqController.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class FaqController extends Controller
{
    protected $faq;
    protected $perPage;

    public function __construct(FaqInterface $faq)
    {
        $this->faq = $faq;
        $this->perPage = config('fully.per_page');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pagiData = $this->faq->paginate(Input::get('page', 1), $this->perPage, true);
        $faqs = Pagination::makeLengthAware($pagiData->items, $pagiData->totalItems, $this->perPage);

        return view('backend.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        try {
            $this->faq->create(Input::all());
            Flash::message('Faq was successfully added');

            return langRedirectRoute('admin.faq.index');
        } catch (ValidationException $e) {
            return langRedirectRoute('admin.faq.create')->withInput()->withErrors($e->getErrors());
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
        $faq = $this->faq->find($id);

        return view('backend.faq.show', compact('faq'));
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
        $faq = $this->faq->find($id);

        return view('backend.faq.edit', compact('faq'));
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
            $this->faq->update($id, Input::all());
            Flash::message('Faq was successfully updated');

            return langRedirectRoute('admin.faq.index');
        } catch (ValidationException $e) {
            return langRedirectRoute('admin.faq.edit')->withInput()->withErrors($e->getErrors());
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
        $this->faq->delete($id);
        Flash::message('Faq was successfully deleted');

        return langRedirectRoute('admin.faq.index');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function confirmDestroy($id)
    {
        $faq = $this->faq->find($id);

        return view('backend.faq.confirm-destroy', compact('faq'));
    }
}
