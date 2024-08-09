<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class INP_Gestion extends Model
{

    protected $table = 'INP_Gestion';

    protected $fillable = [
        'year',
        'part',
        'initDuration',
        'endDuration'
    ];

    public $timestamps = false;
}
