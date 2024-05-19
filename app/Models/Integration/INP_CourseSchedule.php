<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSchedule extends Model
{
    use HasFactory;

    protected $table = 'INP_CourseSchedule';

    protected $fillable = [
        'courseId',
        'schoolDay',
        'classTimeStart',
        'classTimeEnd',
        'createDate',
        'updateDate',
        'deleteDate'
    ];

}
