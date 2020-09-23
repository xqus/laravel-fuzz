<?php

use xqus\LaravelFuzz\Http\Middleware\Authorize;

return [

    /*
    |--------------------------------------------------------------------------
    | Users
    |--------------------------------------------------------------------------
    |
    | This is a list of email addresses of users that can access the Fuzz
    | dashboard.
    |
    */

    'users' => [
        'user@example.com',
    ],

    /*
    |--------------------------------------------------------------------------
    | Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where Telescope will be accessible from. Feel free
    | to change this path to anything you like. Note that the URI will not
    | affect the paths of its internal API that aren't exposed to users.
    |
    */

    'path' => env('FUZZ_PATH', 'fuzz'),

    /*
    |--------------------------------------------------------------------------
    | Master Switch
    |--------------------------------------------------------------------------
    |
    | This option may be used to disable all Fuzz watchers regardless
    | of their individual configuration, which simply provides a single
    | and convenient way to enable or disable Fuzz data storage.
    |
    */

    'enabled' => env('FUZZ_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will be assigned to every Fuzz route, giving you
    | the chance to add your own middleware to this list or change any of
    | the existing middleware. Or, you can simply stick with this list.
    |
    */

    'middleware' => [
        'web',
        Authorize::class,
    ],
];
