
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Content\TaskController;


Route::controller(TaskController::class)->group(function()
{
    Route::get('/tasks-deliveried', 'tasksDeliveried');
    Route::get('/task-info', 'taskInfo');
    Route::post('/task', 'createTask');
    Route::post('/add-delivery', 'addDelivery');
    Route::put('/grade-task', 'gradeTask');
    Route::delete('/deleteTask', 'deleteTask');
});
