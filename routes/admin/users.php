<?php

use Illuminate\Support\Facades\Route;



Route::get('/users', function () {
    return view('admin.users');
})->name('users');

Route::get('/permissions', function () {
    return view('admin.permissions');
})->name('permissions');
