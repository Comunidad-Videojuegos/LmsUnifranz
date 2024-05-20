
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reports\FormReportController;


Route::controller(FormReportController::class)->group(function()
{
    Route::get('/form/made', 'made');
    Route::get('/form/no-made', 'noMade');
    Route::get('/form/responses', 'responses');
    Route::get('/form/responses/for-student', 'responsesForStudent');
});
