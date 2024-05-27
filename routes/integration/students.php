<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Integration\StudentController;


Route::controller(StudentController::class)->group(function()
{
    Route::get('/students', 'index')->name('students');
});
