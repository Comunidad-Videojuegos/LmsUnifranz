<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ConfigController;


Route::controller(ConfigController::class)->group(function()
{
    Route::get('/config', 'index')->name('config');
});
