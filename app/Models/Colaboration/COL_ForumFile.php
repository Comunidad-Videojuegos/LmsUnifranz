<?php

namespace App\Models\Colaboration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumFile extends Model
{
    use HasFactory;

    protected $table = 'COL_ForumFile';

    protected $fillable = [
        'forumId',
        'size',
        'type',
        'name',
        'description',
        'createDate',
        'updateDate',
        'deleteDate'
    ];

}
