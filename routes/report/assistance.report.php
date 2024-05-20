
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reports\AssistanceReportController;


Route::controller(AssistanceReportController::class)->group(function()
{
    Route::get('/assistance/general', 'general');
    Route::get('/assistance/for-student', 'forStudent');
});
