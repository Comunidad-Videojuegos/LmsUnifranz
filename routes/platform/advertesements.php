<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Platform\AdvertisementsController;


Route::controller(AdvertisementsController::class)->group(function()
{
    Route::get('/advertisements', 'index')->name('advertisements');
});
