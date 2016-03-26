<?php

namespace Fully\Http\Controllers;

use Illuminate\Http\Request;
use Fully\Services\Pagination;
use Fully\Repositories\Video\VideoInterface;
use Fully\Repositories\Video\VideoRepository as Video;

/**
 * Class VideoController.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class VideoController extends Controller
{
    /**
     * video repository
     * @var
     */
    protected $video;

    /**
     * per page
     * @var
     */
    protected $perPage;

    /**
     * VideoController constructor.
     * @param VideoInterface $video
     */
    public function __construct(VideoInterface $video)
    {
        $this->video = $video;
        $this->perPage = config('fully.modules.video.per_page');
    }

    /**
     * Display a listing of the resource
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $pagiData = $this->video->paginate($request->get('page', 1), $this->perPage, false);
        $videos = Pagination::makeLengthAware($pagiData->items, $pagiData->totalItems, $this->perPage);

        return view('frontend.video.index', compact('videos'));
    }

    /**
     * Display a resource by slug
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $video = $this->video->getBySlug($slug);

        if($video == null)
            return Response::view('errors.missing', [], 404);

        return view('frontend.video.show', compact('video'));
    }
}
