<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Content\CarreerController;


Route::controller(CarreerController::class)->group(function()
{
    Route::get('/content/carreers', 'index')->name('carreers');
});
