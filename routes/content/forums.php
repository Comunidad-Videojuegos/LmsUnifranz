


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Content\ForumController;


Route::controller(ForumController::class)->group(function()
{
    Route::get('/forum-conversation', 'forumConversation');
    Route::post('/forum-conversation', 'addMessageConversation');
    Route::delete('/forum-conversation', 'deleteConversation');
});
