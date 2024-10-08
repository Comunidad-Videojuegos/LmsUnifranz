

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Content\AssistanceController;


Route::controller(AssistanceController::class)->group(function()
{
    Route::get('/assistance-student', 'assistanceOfStudent');
    Route::get('/types-assistance', 'typesAssistance');
    Route::post('/make-assistance', 'makeAssistance');
});
