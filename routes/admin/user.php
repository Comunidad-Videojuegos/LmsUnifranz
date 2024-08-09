<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;


Route::controller(UserController::class)->group(function()
{
    Route::get('/careers', 'careers');
    Route::put('/career', 'updateCareer');
    Route::post('/career', 'createCareer');
    Route::get('/career-info', 'careerInfo');
    Route::post('/student', 'createStudent');
    Route::post('/instructor', 'createInstructor');
    Route::get('/user-info', 'userInfo');
    Route::put('/user-info', 'update');
});
