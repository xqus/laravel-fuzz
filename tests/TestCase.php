<?php

namespace xqus\LaravelFuzz\Tests;

use xqus\LaravelFuzz\LaravelFuzzServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        define('LARAVEL_START', microtime(true));
        // additional setup
    }

    protected function getPackageProviders($app)
    {
        return [
            BlogPackageServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }
}
