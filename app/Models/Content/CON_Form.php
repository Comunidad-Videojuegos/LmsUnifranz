<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table = 'CON_Form';

    protected $fillable = [
        'coursesectionid',
        'ordernumber',
        'createuserid',
        'duration',
        'calification',
        'creationdate',
        'updatedate',
        'deletedate',
    ];

    protected $casts = [
        'coursesectionid' => 'integer',
        'ordernumber' => 'integer',
        'createuserid' => 'integer',
        'duration' => 'time',
        'calification' => 'interger',
        'creationdate' => 'datetime',
        'updatedate' => 'datetime',
        'deletedate' => 'datetime:nullable',
    ];

    public function Form()
    {
        return $this->hasMany(CON_Form::class);
    }

    public function Coursesection()
    {
        return $this->belongsTo(CON_CourseSection::class, 'coursesectionid');
    }
}
