<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class INP_Student extends Model
{
    use HasFactory;

    protected $table = 'INP_Student';

    protected $fillable = [
        'id',
        'careerId',
        'semester',
        'referenceId',
        'createDate',
        'updateDate',
        'deleteDate'
    ];
    public $timestamps = false;

}
