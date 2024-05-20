<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APR_PlanLearning extends Model
{
    use HasFactory;

    protected $table = 'APR_PlanLearning';

    protected $fillable = [
        'name',
        'description',
        'courseId',
        'createDate',
        'updateDate',
        'deleteDate'
    ];

    public $timestamps = false;
}
