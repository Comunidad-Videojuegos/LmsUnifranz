<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RolController;


Route::controller(RolController::class)->group(function()
{
    Route::get('/roles', 'index')->name('roles');
});
