<?php

namespace Fully\Http\Middleware;

use Closure;
use Sentinel;

/**
 * Class SentinelAuth.
 *
 * @author Sefa Karagöz <karagozsefa@gmail.com>
 */
class SentinelAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Sentinel::check()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest(route('admin.login'));
            }
        }

        return $next($request);
    }
}
