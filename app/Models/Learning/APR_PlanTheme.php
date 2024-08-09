<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APR_PlanTheme extends Model
{
    use HasFactory;

    protected $table = 'APR_PlanTheme';

    protected $fillable = [
        'name',
        'description',
        'orderNumber',
        'planId',
        'courseSectionId',
        'createDate',
        'updateDate',
        'deleteDate'
    ];

    public $timestamps = false;
}
