<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseAssistanceType extends Model
{
    use HasFactory;

    protected $table = 'RPT_CourseAssistanceType';

    protected $fillable = [
        'name',
        'description',
        'deleteDate',
    ];

}
