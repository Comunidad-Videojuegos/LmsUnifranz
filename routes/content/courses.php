
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
    Route::get('/course-info', 'courseInfo');
    Route::post('/add-section', 'addSection');
    Route::put('/update-section', 'updateSection');
    Route::delete('/delete-section', 'deleteSection');
    Route::post('/course', 'updateCourse');
});
