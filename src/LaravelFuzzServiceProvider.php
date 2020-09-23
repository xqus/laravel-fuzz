<?php

/**
 * Laravel Fuzz - A Laravel performance monitor
 *
 * @author  Audun Larsen <larsen@xqus.com>
 * @license MIT License
 */

namespace xqus\LaravelFuzz;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class LaravelFuzzServiceProvider extends ServiceProvider
{

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/fuzz.php',
            'fuzz'
        );

        $this->commands([
            Console\PublishCommand::class,
        ]);

        // Make Laravel Fuzz available as an singleton. We will use this later to
        // access the same instance of the class trough the execution of Laravel.
        $this->app->singleton('xqus\LaravelFuzz\LaravelFuzz', function ($app) {
            return new \xqus\LaravelFuzz\LaravelFuzz();
        });
    }

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'../../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-fuzz');

        if ($this->app->runningInConsole()) {
            $this->publishes(
                [
                    __DIR__ . '/../public' => public_path('xqus/laravel-fuzz'),
                ],
                'fuzz-assets'
            );

            $this->publishes([
                __DIR__.'/../config/fuzz.php' => config_path('fuzz.php'),
            ], 'fuzz-config');

            $this->publishes(
                [
                    __DIR__ . '/../database/migrations/2020_09_20_164014_create_performance_logs_table.php'
                    => database_path('migrations/2020_09_20_164014_create_performance_logs_table.php')
                ],
                'fuzz-migrations'
            );
        }

        // Instantiate the Laravel Fuzz class trough the Laravel service container.
        $fuzz = $this->app->make('xqus\LaravelFuzz\LaravelFuzz');

        /*
        |--------------------------------------------------------------------------
        | Listen for the Illuminate\Database\Events\QueryExecuted
        |--------------------------------------------------------------------------
        |
        | We listen for the event that is called every time a datbase query is
        | done. We then pass information about it to Laravel Fuzz so that we
        | can count the mumber of queries each request generates, as well as the
        | total time we are waiting for the datbase results.
        | In the feature we should also save slow requests to a separate table.
        |
        */
        Event::listen(
            'Illuminate\Database\Events\QueryExecuted',
            function ($data) use ($fuzz) {
                $fuzz->dbQuery($data);
            }
        );

        /*
        |--------------------------------------------------------------------------
        | Listen for the Illuminate\Foundation\Http\Events\RequestHandled
        |--------------------------------------------------------------------------
        |
        | We listen for the event that is called when a request is finished by
        | Laravel. Then we log information about the request, like for example how
        | many SQL queries we performed and the memory usage. We also save som meta
        | information about the request.
        |
        */
        Event::listen(
            'Illuminate\Foundation\Http\Events\RequestHandled',
            function ($data) use ($fuzz) {
                $fuzz->logPerformance($data);
            }
        );
    }
}
