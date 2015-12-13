<?php namespace Fully\Http\Middleware;

use Closure, Config;
use Illuminate\Contracts\Routing\Middleware;

class BeforeMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->segment(2) === 'admin') {
            Config::set("is_admin", true);
        }
        else {
            Config::set("is_admin", false);
        }

        return $next($request);
    }
}