<?php

namespace App\Models\Colaboration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $table = 'COL_Forum';

    protected $fillable = [
        'header',
        'content',
        'createUserId',
        'answer',
        'views',
        'orderNumber',
        'description',
        'createDate',
        'updateDate',
        'deleteDate'
    ];

}
