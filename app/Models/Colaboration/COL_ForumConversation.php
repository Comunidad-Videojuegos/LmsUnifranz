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

    // Relación para los archivos asociados a esta conversación
    public function files()
    {
        return $this->hasMany(COL_ForumConversationFile::class, 'conversationId');
    }

    // Relación para las respuestas (conversaciones hijas)
    public function responses()
    {
        return $this->hasMany(COL_ForumConversation::class, 'conversationId');
    }
}
