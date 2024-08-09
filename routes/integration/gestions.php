<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Integration\GestionController;


Route::controller(GestionController::class)->group(function()
{
    Route::get('/gestions', 'gestions');
});
