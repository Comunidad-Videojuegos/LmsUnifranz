
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reports\GradeReportController;


Route::controller(GradeReportController::class)->group(function()
{
    Route::get('/grade/for-sections', 'forSections');
    Route::get('/grade/general', 'general');
});
