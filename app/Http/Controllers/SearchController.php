<?php

namespace Fully\Http\Controllers;

use Illuminate\Http\Request;

use View;
use Search;
use Fully\Services\Pagination;

/**
 * Class SearchController.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class SearchController extends Controller
{
    protected $perPage;

    public function __construct()
    {
        $this->perPage = config('fully.per_page');
    }

    public function index(Request $request)
    {
        $q = $request->get('search');

        View::composer('frontend/layout/menu', function ($view) use ($q)
        {
            $view->with('q', $q);
        });

        $result = Search::search($q);
        $paginator = Pagination::makeLengthAware($result, count($result), $this->perPage);

        return view('frontend.search.index', compact('paginator', 'q'));
    }
}
