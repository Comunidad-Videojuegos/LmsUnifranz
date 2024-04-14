<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'CON_Activity';

    protected $fillable = [
        'CourseSectionId',
        'ActivityTypeId',
        'Virtual',
        'Name',
        'Description',
        'ActivityDate',
        'Duration',
        'CreationDate',
        'UpdateDate',
        'DeleteDate',
        'Calification',
        'ForCourseId',
    ];

    protected $casts = [
        'CourseSectionId' => 'integer',
        'ActivityTypeId' => 'integer',
        'Virtual' => 'boolean',
        'Name' => 'string',
        'Description' => 'string',
        'ActivityDate' => 'datetime',
        'Duration' => 'time',
        'CreationDate' => 'datetime',
        'UpdateDate' => 'datetime',
        'DeleteDate' => 'datetime:nullable',
        'ForCourseId' => 'integer',
    ];

    public function courseSection()
    {
        return $this->belongsTo(CON_CourseSection::class, 'CourseSectionId');
    }

    public function activityType()
    {
        return $this->belongsTo(CON_ActivityType::class, 'ActivityTypeId');
    }
}
