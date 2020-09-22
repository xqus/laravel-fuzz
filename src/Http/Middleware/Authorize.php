<?php

namespace xqus\LaravelFuzz\Http\Middleware;

use xqus\LaravelFuzz\LaravelFuzz;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return LaravelFuzz::check($request) ? $next($request) : abort(403);
    }
}
