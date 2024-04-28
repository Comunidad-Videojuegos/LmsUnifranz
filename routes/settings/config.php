<?php

use Illuminate\Support\Facades\Route;



Route::get('/config', function () {
    return view('settings.config');
})->name('config');
