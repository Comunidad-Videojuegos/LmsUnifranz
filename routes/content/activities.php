<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Content\ActivityController;


Route::controller(ActivityController::class)->group(function()
{
    Route::get('/activities', 'index')->name('activities');
});
