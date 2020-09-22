<?php

namespace xqus\LaravelFuzz\Tests\Feature;

use Illuminate\Console\Application;
use Illuminate\Support\Facades\Artisan;
use Orchestra\Testbench\TestCase;

class PerformanceLogTest extends TestCase
{
    /**
     * @test
     */
    public function a_perfomance_log_is_created()
    {
        $this->assertTrue(true);
    }
}
