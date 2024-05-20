<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RPT_CourseAssistance extends Model
{
    use HasFactory;

    protected $table = 'RPT_CourseAssistance';

    protected $fillable = [
        'scheduleId',
        'studentId',
        'typeId',
        'createDate',
        'updateDate',
        'deleteDate',
    ];
    public $timestamps = false;

}
