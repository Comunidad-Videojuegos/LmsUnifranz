<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CON_TaskGroupStudents extends Model
{
    use HasFactory;
    protected $table = 'CON_TaskGroupStudents';

    protected $fillable = [
        'groupId',
        'studentId',
        'createDate',
        'deletedate',
    ];
    public $timestamps = false;
}
