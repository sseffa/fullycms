<?php namespace Fully\Http\Controllers\Admin;

use Fully\Http\Controllers\Controller;
use Fully\Repositories\Category\CategoryInterface;
use Redirect;
use View;
use Input;
use Fully\Repositories\Category\CategoryRepository as Category;
use Fully\Exceptions\Validation\ValidationException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

/**
 * Class CategoryController
 * @package App\Controllers\Admin
 * @author Sefa Karagöz
 */
class CategoryController extends Controller {

    protected $category;

    public function __construct(CategoryInterface $category) {

        $this->category = $category;
        View::share('active', 'blog');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        //$categories = $this->category->paginate();

        $page = Input::get('page', 1);
        $perPage = 10;
        $pagiData = $this->category->paginate($page, $perPage, true);

        $categories = new LengthAwarePaginator($pagiData->items, $pagiData->totalItems, $perPage, [
            'path' => Paginator::resolveCurrentPath()
        ]);

        $categories->setPath("");

        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        try {

            $this->category->create(Input::all());
            //Notification::success('Category was successfully added');
            return langRedirectRoute('admin.category.index');
        } catch (ValidationException $e) {
            return langRedirectRoute('admin.category.create')->withInput()->withErrors($e->getErrors());
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
        return view('backend.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id) {

        $category = $this->category->find($id);
        return view('backend.category.edit', compact('category'));
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
            //Notification::success('Category was successfully updated');
            return langRedirectRoute('admin.category.index');
        } catch (ValidationException $e) {

            return langRedirectRoute('admin.category.edit')->withInput()->withErrors($e->getErrors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id) {

        $this->category->delete($id);
        //Notification::success('Category was successfully deleted');
        return langRedirectRoute('admin.category.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function confirmDestroy($id) {

        $category = $this->category->find($id);
        return view('backend.category.confirm-destroy', compact('category'));
    }
}
