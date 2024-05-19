<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $table = 'APR_Certificate';

    protected $fillable = [
        'name',
        'description',
        'link',
        'studentId',
        'createDate',
        'updateDate',
        'deleteDate'
    ];

}
