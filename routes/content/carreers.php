<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Content\CarreerController;


Route::controller(CarreerController::class)->group(function()
{
    Route::get('/carreers', 'index')->name('carreers');
});
