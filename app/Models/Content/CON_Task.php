<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'CON_Task';

    protected $fillable = [
        'CourseSectionId',
        'Name',
        'Description',
        'Deliveries',
        'Missing',
        'Calification',
        'OrderNumber',
        'CreationDate',
        'UpdateDate',
        'DeleteDate',
    ];

    protected $casts = [
        'CourseSectionId' => 'integer',
        'Name' => 'string',
        'Description' => 'string',
        'Deliveries' => 'boolean',
        'Missing' => 'boolean',
        'Calification' => 'integer',
        'OrderNumber' => 'integer',
        'CreationDate' => 'datetime',
        'UpdateDate' => 'datetime',
        'DeleteDate' => 'datetime:nullable',
    ];

    public function courseSection()
    {
        return $this->belongsTo(CON_CourseSection::class, 'CourseSectionId');
    }

    public function task()
    {
        return $this->hasMany(CON_Task::class);
    }
}
