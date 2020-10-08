<?php

namespace xqus\LaravelFuzz;

use Illuminate\Support\Facades\App;

trait AuthorizesRequests
{
    /**
     * Determine if the given request can access the Fuzz dashboard.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public static function check($request)
    {
        if (App::environment('local')) {
            return true;
        }
        return in_array($request->user()->email, config('fuzz.users', []));
    }
}
