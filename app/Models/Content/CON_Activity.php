<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'CON_Activity';

    protected $fillable = [
        'coursesectionid',
        'activitytypeid',
        'virtual',
        'name',
        'description',
        'activitydate',
        'duration',
        'creationdate',
        'updatedate',
        'deletedate',
        'calification',
        'forcourseid',
    ];

    protected $casts = [
        'coursesectionid' => 'integer',
        'activitytypeid' => 'integer',
        'virtual' => 'boolean',
        'name' => 'string',
        'description' => 'string',
        'activitydate' => 'datetime',
        'duration' => 'time',
        'creationdate' => 'datetime',
        'updatedate' => 'datetime',
        'deletedate' => 'datetime:nullable',
        'forcourseid' => 'integer',
    ];

    public function courseSection()
    {
        return $this->belongsTo(CON_CourseSection::class, 'coursesectionid');
    }

    public function activityType()
    {
        return $this->belongsTo(CON_ActivityType::class, 'activitytypeid');
    }
}
