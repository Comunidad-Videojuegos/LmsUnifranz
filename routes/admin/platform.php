<?php

use Illuminate\Support\Facades\Route;



Route::get('/courses', function () {
    return view('admin.courses');
})->name('courses');

Route::get('/activity', function () {
    return view('admin.activity');
})->name('activity');
