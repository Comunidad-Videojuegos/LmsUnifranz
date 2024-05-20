<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class INP_Course extends Model
{
    use HasFactory;

    protected $table = 'INP_Course';

    protected $fillable = [
        'instructorId',
        'referenceId',
        'name',
        'mandatory',
        'initials',
        'description',
        'groupLink',
        'calificationTotal',
        'createDate',
        'updateDate',
        'deleteDate'
    ];

    public $timestamps = false;
}
