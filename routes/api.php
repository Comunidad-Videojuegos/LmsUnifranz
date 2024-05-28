<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Smtp\EmailController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// COURSES
// Route::prefix('courses')->group(function()
//     {
//         include __DIR__. '/content/courses.php';
//     }
// );

// Integration
// Route::prefix('int')->group(function()
//     {
//         include __DIR__. '/integration/student.php';
//     }
// );

// REPORTES
Route::prefix('report')->group(function()
    {
        include __DIR__. '/report/activity.report.php';
        include __DIR__. '/report/assistance.report.php';
        include __DIR__. '/report/form.report.php';
        include __DIR__. '/report/forum.report.php';
        include __DIR__. '/report/general.report.php';
        include __DIR__. '/report/grade.report.php';
        include __DIR__. '/report/task.report.php';
    }
);


Route::controller(EmailController::class)->group(function()
{
    Route::get('/email/send', 'sendEmail');
});
