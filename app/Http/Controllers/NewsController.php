<?php

namespace Fully\Http\Controllers;

use Illuminate\Http\Request;

use Fully\Services\Pagination;
use Fully\Repositories\News\NewsInterface;
use Fully\Repositories\News\NewsRepository as News;

/**
 * Class NewsController.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class NewsController extends Controller
{
    /**
     * @var NewsInterface
     */
    protected $news;

    protected $perPage;

    /**
     * @param NewsInterface $news
     */
    public function __construct(NewsInterface $news)
    {
        $this->news = $news;
        $this->perPage = config('fully.modules.news.per_page');
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $pagiData = $this->news->paginate($request->get('page', 1), $this->perPage, false);
        $news = Pagination::makeLengthAware($pagiData->items, $pagiData->totalItems, $this->perPage);

        return view('frontend.news.index', compact('news'));
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $news = $this->news->getBySlug($slug);

        if ($news == null) {
            return Response::view('errors.missing', [], 404);
        }

        return view('frontend.news.show', compact('news'));
    }
}
