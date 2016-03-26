<?php

namespace Fully\Http\Controllers\Admin;

use View;
use Input;
use Flash;
use Fully\Services\Pagination;
use Fully\Http\Controllers\Controller;
use Fully\Repositories\Project\ProjectInterface;
use Fully\Exceptions\Validation\ValidationException;
use Fully\Repositories\Project\ProjectRepository as Project;

/**
 * Class ProjectController.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class ProjectController extends Controller
{
    protected $project;
    protected $perPage;

    public function __construct(ProjectInterface $project)
    {
        $this->project = $project;
        $this->perPage = config('fully.per_page');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pagiData = $this->project->paginate(Input::get('page', 1), $this->perPage, true);
        $projects =  Pagination::makeLengthAware($pagiData->items, $pagiData->totalItems, $this->perPage);

        return view('backend.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        try {
            $this->project->create(Input::all());
            Flash::message('Project was successfully added');

            return langRedirectRoute('admin.project.index');
        } catch (ValidationException $e) {
            return langRedirectRoute('admin.project.create')->withInput()->withErrors($e->getErrors());
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
        $project = $this->project->find($id);

        return view('backend.project.show', compact('project'));
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
        $project = $this->project->find($id);

        return view('backend.project.edit', compact('project'));
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
            $this->project->update($id, Input::all());
            Flash::message('Project was successfully updated');

            return langRedirectRoute('admin.project.index');
        } catch (ValidationException $e) {
            return langRedirectRoute('admin.project.edit')->withInput()->withErrors($e->getErrors());
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
        $this->project->delete($id);
        Flash::message('Project was successfully deleted');

        return langRedirectRoute('admin.project.index');
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function confirmDestroy($id)
    {
        $project = $this->project->find($id);

        return view('backend.project.confirm-destroy', compact('project'));
    }
}
