<?php

use Illuminate\Support\Facades\Route;



Route::get('/config', function () {
    return view('admin.config');
})->name('config');
