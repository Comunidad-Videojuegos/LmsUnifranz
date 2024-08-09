<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Model;

class RPT_PlatformActivityType extends Model
{
    protected $table = 'RPT_PlatformActivityType';

    protected $fillable = [
        'name',
        'description',
    ];

    public $timestamps = false;
}
