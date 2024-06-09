<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Integration\InstructorController;


Route::controller(InstructorController::class)->group(function()
{
    Route::get('/users/instructors', 'index')->name('instructors');
    Route::get('/instructors', 'instructors');
});
