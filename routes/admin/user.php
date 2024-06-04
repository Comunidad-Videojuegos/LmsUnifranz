<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;


Route::controller(UserController::class)->group(function()
{
    Route::get('/user-info', 'userInfo');
    Route::put('/user-info', 'update');
});
