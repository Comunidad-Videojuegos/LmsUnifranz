<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Model;

class RPT_CourseAssistanceType extends Model
{

    protected $table = 'RPT_CourseAssistanceType';

    protected $fillable = [
        'name',
        'description',
        'deleteDate',
    ];
    public $timestamps = false;

}
