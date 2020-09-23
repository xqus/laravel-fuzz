<?php

namespace xqus\LaravelFuzz\Components;

use Livewire\Component;
use xqus\LaravelFuzz\Models\PerformanceLog;

class ResponseTime extends Component
{
    public function render()
    {
        return view('laravel-fuzz::response-time', [
            'responseTime' => ceil(PerformanceLog::avg('execution_time')),
        ]);
    }
}
