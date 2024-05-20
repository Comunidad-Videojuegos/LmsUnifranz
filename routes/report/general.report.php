
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reports\GeneralReportController;


Route::controller(GeneralReportController::class)->group(function()
{
    Route::get('/general/students/for-career', 'studentsForCareer');
    Route::get('/general/students/for-course', 'studentsForCourse');
    Route::get('/general/instructors', 'instructors');
    Route::get('/general/activities', 'activities');
    Route::get('/general/task-forum-form', 'taskForumForm');
    Route::get('/general/student', 'student');
    Route::get('/general/student/record', 'studentRecord');
    Route::get('/general/instructor', 'instructor');
});
