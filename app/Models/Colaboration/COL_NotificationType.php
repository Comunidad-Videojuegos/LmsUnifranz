<?php

namespace App\Models\Colaboration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationType extends Model
{
    use HasFactory;

    protected $table = 'COL_TypeNotification';

    protected $fillable = [
        'name',
        'color'
    ];

}
