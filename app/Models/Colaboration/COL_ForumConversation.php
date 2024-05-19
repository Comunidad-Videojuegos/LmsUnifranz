<?php

namespace App\Models\Colaboration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumConversation extends Model
{
    use HasFactory;

    protected $table = 'COL_ForumConversation';

    protected $fillable = [
        'educatorId',
        'forumId',
        'message',
        'views',
        'answers',
        'createDate',
        'updateDate',
        'deleteDate'
    ];

}
