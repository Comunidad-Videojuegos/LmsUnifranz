<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanMaterialProgress extends Model
{
    use HasFactory;

    protected $table = 'RPT_PlanMaterialProgress';

    protected $fillable = [
        'planMaterialId',
        'studentId',
        'advance'
    ];

}
