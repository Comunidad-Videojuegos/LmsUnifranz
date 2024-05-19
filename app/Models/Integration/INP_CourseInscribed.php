<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseInscribed extends Model
{
    use HasFactory;

    protected $table = 'INP_CourseInscribed';

    protected $fillable = [
        'courseId',
        'studentId',
        'careerId',
        'status',
        'noteTotal',
        'createDate',
        'updateDate',
        'deleteDate'
    ];

}
