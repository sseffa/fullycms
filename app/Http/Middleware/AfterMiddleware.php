<?php namespace Fully\Http\Middleware;

use Closure, Config;
use Illuminate\Contracts\Routing\Middleware;

class AfterMiddleware implements Middleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //
    }
}