<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;


Route::controller(PermissionController::class)->group(function()
{
    Route::get('/permissions', 'index')->name('permissions');
});
