
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reports\TaskReportController;


Route::controller(TaskReportController::class)->group(function()
{
    Route::get('/task/made', 'made');
    Route::get('/task/no-made', 'noMade');
    Route::get('/task/made-no-made', 'madeNoMade');
});
