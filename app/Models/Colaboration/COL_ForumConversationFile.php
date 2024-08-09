<?php

namespace App\Models\Colaboration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class COL_ForumConversationFile extends Model
{
    use HasFactory;

    protected $table = 'COL_ForumConversationFile';

    protected $fillable = [
        'conversationId',
        'link',
        'size',
        'type'
    ];

    public $timestamps = false;
}
