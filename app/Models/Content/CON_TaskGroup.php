<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CON_TaskGroup extends Model
{
    use HasFactory;
    protected $table = 'CON_TaskGroup';

    protected $fillable = [
        'name',
        'description',
        'createDate',
        'updatedate',
        'deletedate',
    ];
    public $timestamps = false;
}
