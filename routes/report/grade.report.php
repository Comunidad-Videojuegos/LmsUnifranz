
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reports\GradeReportController;


Route::controller(GradeReportController::class)->group(function()
{
    Route::get('/grade/student', 'forStudent');
    Route::get('/grade/general', 'general');
});
