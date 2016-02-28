<?php namespace Fully\Http\Controllers\Admin;

use Fully\Http\Controllers\Controller;
use Fully\Repositories\PhotoGallery\PhotoGalleryInterface;
use Redirect;
use View;
use Input;
use Validator;
use Response;
use File;
use Image;
use Config;
use Flash;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Fully\Repositories\PhotoGallery\PhotoGalleryRepository as PhotoGallery;
use Fully\Exceptions\Validation\ValidationException;

/**
 * Class PhotoGalleryController
 * @package App\Controllers\Admin
 * @author Sefa Karagöz
 */
class PhotoGalleryController extends Controller
{
    protected $photoGallery;

    public function __construct(PhotoGalleryInterface $photoGallery)
    {

        View::share('active', 'modules');
        $this->photoGallery = $photoGallery;
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
        $pagiData = $this->photoGallery->paginate($page, $perPage, true);

        $photo_galleries = new LengthAwarePaginator($pagiData->items, $pagiData->totalItems, $perPage,Paginator::resolveCurrentPage(), [
            'path' => Paginator::resolveCurrentPath()
        ]);

        $photo_galleries->setPath("");

        return view('backend.photo_gallery.index', compact('photo_galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $attributes = [
            'title'        => 'Photo Gallery Title',
            'content'      => 'Photo Gallery Content',
            'is_published' => false
        ];

        try
        {
            $id = $this->photoGallery->create($attributes);
            return Redirect::to("/" . getLang() . "/admin/photo-gallery/" . $id . "/edit");
        } catch(ValidationException $e)
        {
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

        $photo_gallery = $this->photoGallery->find($id);
        return view('backend.photo_gallery.show', compact('photo_gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {

        $photo_gallery = $this->photoGallery->find($id);

        return view('backend.photo_gallery.edit', compact('photo_gallery'));
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
            $this->photoGallery->update($id, Input::all());
            Flash::message('Photo gallery was successfully updated');
            return langRedirectRoute('admin.photo-gallery.index');
        } catch(ValidationException $e)
        {

            return langRedirectRoute('admin.photo_gallery.edit')->withInput()->withErrors($e->getErrors());
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

        $this->photoGallery->delete($id);
        Flash::message('Photo gallery was successfully deleted');
        return langRedirectRoute('admin.photo-gallery.index');
    }

    public function confirmDestroy($id)
    {

        $photo_gallery = $this->photoGallery->find($id);
        return view('backend.photo_gallery.confirm-destroy', compact('photo_gallery'));
    }

    public function togglePublish($id)
    {

        return $this->photoGallery->togglePublish($id);
    }

    public function upload($id)
    {

        try
        {
            $this->photoGallery->upload($id, Input::file());
            return Response::json('success', 200);
        } catch(ValidationException $e)
        {
            return Response::json('error: ' . $e->getErrors(), 400);
        }
    }

    public function deleteImage()
    {

        return $this->photoGallery->deletePhoto(Input::get('file'));
    }
}
