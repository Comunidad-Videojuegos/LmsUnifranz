<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UserController;




Route::controller(UserController::class)->group(function()
{
    Route::get('/users', 'index')->name('users.index');
    Route::get('/users/{id}', 'show')->name('users.show');
    Route::post('/users', 'store')->name('users.store');
    Route::put('/users/{id}', 'update')->name('users.update');
});


Route::get('/permissions', function () {
    return view('admin.permissions');
})->name('permissions');
