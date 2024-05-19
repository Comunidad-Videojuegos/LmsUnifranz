<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;

    protected $table = 'INP_Advert';

    protected $fillable = [
        'name',
        'description',
        'duration',
        'typeId',
        'forStudents',
        'createUserId',
        'createDate',
        'updateDate',
        'deleteDate'
    ];

}
