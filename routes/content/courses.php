
<?php

use App\Helpers\JasperConnection;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Content\CourseController;


Route::controller(CourseController::class)->group(function()
{
    Route::get('/content/courses', 'index')->name('courses');
    Route::get('/courses', 'coursesOfStudent');
    Route::get('/sections', 'sectionsOfCourse');
    Route::get('/tasks-forums', 'taskForumOfSection');
});
