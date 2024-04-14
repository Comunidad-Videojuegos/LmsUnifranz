<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table = 'CON_Form';

    protected $fillable = [
        'CourseSectionId',
        'OrderNumber',
        'CreateUserId',
        'Duration',
        'Calification',
        'CreationDate',
        'UpdateDate',
        'DeleteDate',
    ];

    protected $casts = [
        'CourseSectionId' => 'integer',
        'OrderNumber' => 'integer',
        'CreateUserId' => 'integer',
        'Duration' => 'time',
        'Calification' => 'interger',
        'CreationDate' => 'datetime',
        'UpdateDate' => 'datetime',
        'DeleteDate' => 'datetime:nullable',
    ];

    public function Form()
    {
        return $this->hasMany(CON_Form::class);
    }

    public function Coursesection()
    {
        return $this->belongsTo(CON_CourseSection::class, 'CourseSectionId');
    }
}
