
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Reports\ForumReportController;


Route::controller(ForumReportController::class)->group(function()
{
    Route::get('/forum/state', 'state');
    Route::get('/forum/state/for-student', 'stateForStudent');
});
