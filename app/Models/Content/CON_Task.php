<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CON_Task extends Model
{
    use HasFactory;

    protected $table = 'CON_Task';

    protected $fillable = [
        'courseSectionId',
        'name',
        'description',
        'missing',
        'valoration',
        'orderNumber',
        'createDate',
        'updateDate',
        'deleteDate',
    ];
    public $timestamps = false;


    public function courseSection()
    {
        return $this->belongsTo(CON_CourseSection::class, 'courseSectionId');
    }

    public function task()
    {
        return $this->hasMany(CON_Task::class);
    }
}
