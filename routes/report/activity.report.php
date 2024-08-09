
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reports\ActivityReportController;


Route::controller(ActivityReportController::class)->group(function()
{
    Route::get('/activity/made', 'made');
    Route::get('/activity/no-made', 'noMade');
});
