<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Reports\RPT_CourseAssistance;
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

    public function assistances()
    {
        return $this->hasMany(RPT_CourseAssistance::class, 'scheduleId');
    }
    public function course()
    {
        return $this->belongsTo(INP_Course::class, 'courseId');
    }
}
