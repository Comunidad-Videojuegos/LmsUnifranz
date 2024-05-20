<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class INP_CourseSchedule extends Model
{
    use HasFactory;

    protected $table = 'INP_CourseSchedule';

    protected $fillable = [
        'courseId',
        'schoolDay',
        'timeStart',
        'timeEnd',
        'createDate',
        'updateDate',
        'deleteDate'
    ];
    public $timestamps = false;

}
