<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RolController;


Route::controller(RolController::class)->group(function()
{
    Route::get('/roles', 'index')->name('roles');
    Route::get('/roles/list', 'roles');
    Route::get('/roles/admin', 'rolesAdmin');
});
