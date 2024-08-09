<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertType extends Model
{
    use HasFactory;

    protected $table = 'INP_AdvertType';

    protected $fillable = [
        'name',
        'description',
    ];

}
