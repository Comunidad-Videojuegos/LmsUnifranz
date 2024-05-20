<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APR_PlanThemeMaterial extends Model
{
    use HasFactory;

    protected $table = 'APR_PlanThemeMaterial';

    protected $fillable = [
        'planThemeId',
        'orderNumber',
        'link',
    ];

    public $timestamps = false;
}
