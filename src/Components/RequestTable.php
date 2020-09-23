<?php

namespace xqus\LaravelFuzz\Components;

use Livewire\Component;
use Livewire\WithPagination;
use xqus\LaravelFuzz\Models\PerformanceLog;

class RequestTable extends Component
{
    use WithPagination;

    public function render()
    {
        return view('laravel-fuzz::request-table', [
            'requests' => PerformanceLog::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }
}
