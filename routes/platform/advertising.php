<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Platform\AdvertisingController;


Route::controller(AdvertisingController::class)->group(function()
{
    Route::get('/advertising', 'index')->name('advertising');
});
