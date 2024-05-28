
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Content\TaskController;


Route::controller(TaskController::class)->group(function()
{
    Route::get('/tasks-deliveried', 'tasksDeliveried');
    Route::get('/task-info', 'taskInfo');
});
