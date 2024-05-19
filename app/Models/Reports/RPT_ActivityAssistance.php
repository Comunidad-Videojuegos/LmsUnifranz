<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityAssistance extends Model
{
    use HasFactory;

    protected $table = 'RPT_ActivityAssistance';

    protected $fillable = [
        'activityId',
        'studentId',
        'entry',
        'exit'
    ];

}
