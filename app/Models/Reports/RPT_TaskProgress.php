<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskProgress extends Model
{
    use HasFactory;

    protected $table = 'RPT_TaskProgress';

    protected $fillable = [
        'courseSectionId',
        'tasksDone',
        'tasksNotDone',
        'calificationTotal'
    ];

}
