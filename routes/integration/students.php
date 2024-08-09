<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Integration\StudentController;


Route::controller(StudentController::class)->group(function()
{
    Route::get('/users/students', 'index')->name('students');
    Route::get('/students', 'students');
    Route::get('/students-for-course', 'studentsForCareer');
});
