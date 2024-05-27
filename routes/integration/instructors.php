<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Integration\InstructorController;


Route::controller(InstructorController::class)->group(function()
{
    Route::get('/instructors', 'index')->name('instructors');
});
