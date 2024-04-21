<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'CON_Task';

    protected $fillable = [
        'coursesectionid',
        'name',
        'description',
        'deliveries',
        'missing',
        'calification',
        'ordernumber',
        'creationdate',
        'updatedate',
        'deletedate',
    ];

    protected $casts = [
        'coursesectionid' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'deliveries' => 'boolean',
        'missing' => 'boolean',
        'calification' => 'integer',
        'ordernumber' => 'integer',
        'creationdate' => 'datetime',
        'updatedate' => 'datetime',
        'deletedate' => 'datetime:nullable',
    ];

    public function courseSection()
    {
        return $this->belongsTo(CON_CourseSection::class, 'coursesectionid');
    }

    public function task()
    {
        return $this->hasMany(CON_Task::class);
    }
}
