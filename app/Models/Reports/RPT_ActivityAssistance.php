<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RPT_ActivityAssistance extends Model
{
    use HasFactory;

    protected $table = 'RPT_ActivityAssistance';

    protected $fillable = [
        'activityId',
        'studentId',
        'entry',
        'exit'
    ];

    public $timestamps = false;
}
