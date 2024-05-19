<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'CON_Task';

    protected $fillable = [
        'courseSectionId',
        'name',
        'description',
        'deliveries',
        'missing',
        'calification',
        'orderNumber',
        'createDate',
        'updateDate',
        'deleteDate',
    ];


    public function courseSection()
    {
        return $this->belongsTo(CON_CourseSection::class, 'courseSectionId');
    }

    public function task()
    {
        return $this->hasMany(CON_Task::class);
    }
}
