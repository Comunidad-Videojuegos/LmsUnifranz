<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RPT_TaskDeliveries extends Model
{
    use HasFactory;

    protected $table = 'RPT_TaskDeliveries';

    protected $fillable = [
        'taskId',
        'studentId',
        'viewed',
        'reviewed',
        'calification',
        'createDate',
        'updateDate',
        'deleteDate',
    ];

    public $timestamps = false;
}
