<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Content\EvidenceController;


Route::controller(EvidenceController::class)->group(function()
{
    Route::get('/evidences', 'index')->name('evidences');
});
