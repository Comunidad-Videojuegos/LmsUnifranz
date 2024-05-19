<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $table = 'INP_Career';

    protected $fillable = [
        'name',
        'referenceId',
        'initials',
        'description',
        'duration',
        'createDate',
        'updateDate',
        'deleteDate'
    ];

}
