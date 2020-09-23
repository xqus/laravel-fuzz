<?php

namespace xqus\LaravelFuzz;

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
        dd($request->user());
        return true;
    }
}
