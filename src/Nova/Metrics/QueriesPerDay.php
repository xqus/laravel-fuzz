<?php

namespace xqus\LaravelFuzz\Nova\Metrics;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Trend;
use xqus\LaravelFuzz\Models\PerformanceLog;

class QueriesPerDay extends Trend
{
    public function name()
    {
        return 'Total Database Queries';
    }
    /**
     * Calculate the value of the metric.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        return $this->sumByHours($request, PerformanceLog::class, 'db_query_count')->showLatestValue();
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [
            24  => 'today',
            48  => 'last two days',
            168 => 'last week',
            720 => 'last 30 days',
        ];
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'queries-per-day';
    }
}
