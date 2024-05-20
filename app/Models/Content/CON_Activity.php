<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CON_Activity extends Model
{
    use HasFactory;

    protected $table = 'CON_Activity';

    protected $fillable = [
        'name',
        'description',
        'orderNumber',
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

    public $timestamps = false;

    public function courseSection()
    {
        return $this->belongsTo(CON_CourseSection::class, 'courseSectionId');
    }

    public function activityType()
    {
        return $this->belongsTo(CON_ActivityType::class, 'typeId');
    }
}
