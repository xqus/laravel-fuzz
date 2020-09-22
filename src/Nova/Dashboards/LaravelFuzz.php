<?php

namespace xqus\LaravelFuzz\Nova\Dashboards;

use xqus\LaravelFuzz\Nova\Metrics\AverageDbTime;
use xqus\LaravelFuzz\Nova\Metrics\AverageResponeTime;
use xqus\LaravelFuzz\Nova\Metrics\QueriesPerDay;
use xqus\LaravelFuzz\Nova\Metrics\RequestsPerDay;
use xqus\LaravelFuzz\Nova\Metrics\ResponeCodes;
use xqus\LaravelFuzz\Nova\Metrics\ResponseTime;
use Laravel\Nova\Dashboard;

class LaravelFuzz extends Dashboard
{

    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            (new ResponseTime)->width('1/3')->help('This is the average response time for the selected period.'),
            (new AverageResponeTime)->width('2/3'),
            (new AverageDbTime)->width('1/3'),
            (new RequestsPerDay)->width('1/3'),
            (new QueriesPerDay)->width('1/3'),
            (new ResponeCodes)->width('1/3'),
        ];
    }

    public static function label()
    {
        return 'Laravel Fuzz';
    }

    /**
     * Get the URI key for the dashboard.
     *
     * @return string
     */
    public static function uriKey()
    {
        return 'fuzz';
    }
}
