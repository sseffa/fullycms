<?php namespace Sefa\Filters;

use Illuminate\Routing\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Cache;
use Str;

/**
 * Simple route caching
 *
 * USAGE:
 * Route::get('/', 'PagesController@index')->before('cache.fetch')->after('cache.set');
 */
class CacheFilter {

    /**
     * If route is cached, use that instead
     *
     * @param Route $route
     * @param Request $request
     */
    public function fetch(Route $route, Request $request) {

        $key = $this->makeCacheKey($request->url());

        if (Cache::has($key)) return Cache::get($key);
    }

    /**
     * Cache route
     *
     * @param Route $route
     * @param Request $request
     * @param Response $response
     */
    public function put(Route $route, Request $request, Response $response) {

        $key = $this->makeCacheKey($request->url());

        if (!Cache::has($key)) Cache::put($key, $response->getContent(), 60);
    }

    /**
     * Create a unique cache identifier/key
     *
     * @param string $url
     */
    protected function makeCacheKey($url) {

        return 'route-' . Str::slug($url);
    }
}