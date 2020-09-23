<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/fuzz', function () {
        return view('laravel-fuzz::layout');
    });
});
