
<?php

use App\Helpers\JasperConnection;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Content\CourseController;


Route::controller(CourseController::class)->group(function()
{
    Route::get('/courses', 'index')->name('courses');
});
