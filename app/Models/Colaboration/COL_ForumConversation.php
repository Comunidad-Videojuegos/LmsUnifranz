<?php

namespace App\Models\Colaboration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class COL_ForumConversation extends Model
{
    use HasFactory;

    protected $table = 'COL_ForumConversation';

    protected $fillable = [
        'educatorId',
        'conversationId',
        'forumId',
        'message',
        'createDate',
        'updateDate',
        'deleteDate'
    ];

    public $timestamps = false;
}
