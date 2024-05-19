<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatformActivityType extends Model
{
    use HasFactory;

    protected $table = 'RPT_PlatformActivityType';

    protected $fillable = [
        'name',
        'description',
    ];

}
