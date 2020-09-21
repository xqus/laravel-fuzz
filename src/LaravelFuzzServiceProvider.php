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
    public function register()
    {
        //
    }

    public function boot()
    {
        if (! class_exists('CreatePerformanceLogsTable')) {
            $this->publishes(
                [
                    __DIR__ . '/../database/migrations/2020_09_20_164014_create_performance_logs_table.php'
                    => database_path('migrations/2020_09_20_164014_create_performance_logs_table.php')
                ],
                'migrations'
            );
        }

        Event::listen(
            '*',
            function ($eventName, array $data) {
                // Illuminate\Database\Events\QueryExecuted
                // Illuminate\Foundation\Http\Events\RequestHandled
            }
        );
    }
}
