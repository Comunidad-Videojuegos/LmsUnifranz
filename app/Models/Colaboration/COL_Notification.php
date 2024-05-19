<?php

namespace App\Models\Colaboration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'COL_Notification';

    protected $fillable = [
        'userId',
        'typeId',
        'header',
        'body',
        'read',
        'createDate'
    ];

}
