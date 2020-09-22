<?php

/**
 * Laravel Fuzz - A Laravel performance monitor
 *
 * @author  Audun Larsen <larsen@xqus.com>
 * @license MIT License
 */

namespace xqus\LaravelFuzz;

use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Foundation\Http\Events\RequestHandled;
use xqus\LaravelFuzz\Models\PerformanceLog;

class LaravelFuzz
{
    public $dbQueries = 0;
    public $dbTime = 0;

    /**
     * Log information about a SQL query.
     *
     * @param $data Illuminate\Database\Events\QueryExecuted
     *
     * @return void
     */
    public function dbQuery(QueryExecuted $data)
    {
        $this->dbQueries++;
        $this->dbTime += $data->time;
    }

    /**
     * Save information about a comleted request to the database.
     *
     * @param $data Illuminate\Database\Events\QueryExecuted
     *
     * @return void
     */
    public function logPerformance(RequestHandled $data)
    {
        PerformanceLog::forceCreate([
            'request_method' => $data->request->getMethod(),
            'request_url' => $data->request->fullUrl(),
            'request_path' => $data->request->path(),
            'controller_action' => optional($data->request->route())->getActionName(),
            'response_code' => $data->response->getStatusCode(),
            'execution_time' => $this->getExecutionTime(),
            'db_query_count' => $this->dbQueries,
            'db_execution_time' => $this->dbTime,
            'models_count' => 0,
            'memory_peak' => round(memory_get_peak_usage(true) / 1024 / 1024, 4, 1)
        ]);
    }

    /**
     * Calculate the time (in ms) since Laravel was started.
     *
     * @return float Time in milliseconds
     */
    protected function getExecutionTime()
    {
        return round((microtime(true) - LARAVEL_START) * 1000, 1);
    }
}
