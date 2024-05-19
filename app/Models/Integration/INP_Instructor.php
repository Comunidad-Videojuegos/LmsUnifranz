<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $table = 'INP_Instructor';

    protected $fillable = [
        'id',
        'speciality',
        'type'
    ];

}
