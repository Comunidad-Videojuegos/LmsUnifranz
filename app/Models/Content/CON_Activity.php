<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'CON_Activity';

    protected $fillable = [
        'name',
        'description',
        'courseSectionId',
        'typeId',
        'virtual',
        'activityDate',
        'duration',
        'calification',
        'createDate',
        'updateDate',
        'deleteDate'
    ];

    public function courseSection()
    {
        return $this->belongsTo(CON_CourseSection::class, 'courseSectionId');
    }

    public function activityType()
    {
        return $this->belongsTo(CON_ActivityType::class, 'typeId');
    }
}
