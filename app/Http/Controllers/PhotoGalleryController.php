<?php namespace Fully\Http\Controllers;

use Fully\Repositories\PhotoGallery\PhotoGalleryRepository as PhotoGallery;
use Fully\Repositories\PhotoGallery\PhotoGalleryInterface;
use Response;

/**
 * Class PhotoGalleryController
 * @author Sefa Karagöz
 */
class PhotoGalleryController extends Controller {

    /**
     * @var Fully\Repositories\PhotoGallery\PhotoGalleryInterface
     */
    protected $photoGallery;

    /**
     * @param PhotoGalleryInterface $photoGallery
     */
    public function __construct(PhotoGalleryInterface $photoGallery) {

        $this->photoGallery = $photoGallery;
    }

    /**
     * Display photo gallery
     * @param $slug
     * @return \Illuminate\View\View
     */
    public function show($slug) {

        $photo_gallery = $this->photoGallery->getBySlug($slug);

        if($photo_gallery === null)
            return Response::view('errors.missing', array(), 404);

        return view('frontend.photo_gallery.show', compact('photo_gallery'));
    }
}
