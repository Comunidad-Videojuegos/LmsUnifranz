<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'INP_Course';

    protected $fillable = [
        'instructorId',
        'referenceId',
        'name',
        'mandatory',
        'initials',
        'description',
        'groupLink',
        'calificationTotal',
        'forCourseId',
        'createDate',
        'updateDate',
        'deleteDate'
    ];

}
