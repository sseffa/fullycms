<?php

namespace Fully\Http\Controllers;

use Fully\Repositories\Project\ProjectInterface;

/**
 * Class ProjectController.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class ProjectController extends Controller
{
    protected $project;

    /**
     * @param ProjectInterface $project
     */
    public function __construct(ProjectInterface $project)
    {
        $this->project = $project;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = $this->project->all();

        return view('frontend.project.index', compact('projects'));
    }

    /**
     * Display page.
     *
     * @param $slug
     *
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $project = $this->project->getBySlug($slug);

        if ($project == null) {
            return Response::view('errors.missing', array(), 404);
        }

        return view('frontend.project.show', compact('project'));
    }
}
