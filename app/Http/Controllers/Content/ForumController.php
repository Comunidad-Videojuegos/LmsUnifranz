<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Colaboration\COL_ForumConversation;
use App\Models\Colaboration\COL_ForumConversationFile;

class ForumController extends Controller
{

    public function forumConversation(Request $request)
    {
        $forumId = $request->input('forumId');

        $conversations = COL_ForumConversation::select('id', 'message')
            ->where('forumId', $forumId)
            ->with([
                'files:id,conversationId,link,size,type',
                'responses' => function ($query) {
                    $query->select('id', 'message', 'conversationId')
                        ->with(['files:id,conversationId,link,size']);
                }
            ])
            ->take(1000)
            ->get();

        return response()->json($conversations);
    }
}
