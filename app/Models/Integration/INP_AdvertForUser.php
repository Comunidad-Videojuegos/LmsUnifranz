<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertForUser extends Model
{
    use HasFactory;

    protected $table = 'INP_AdvertForUser';

    protected $fillable = [
        'advertId',
        'rolId',
        'createDate',
        'updateDate',
        'deleteDate'
    ];

}
