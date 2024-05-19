<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSection extends Model
{
    use HasFactory;

    protected $table = 'CON_CourseSection';

    protected $fillable = [
        'courseId',
        'name',
        'assistance',
        'initDate',
        'endDate',
    ];

    public function CourseSection()
    {
        return $this->hasMany(CON_CourseSection::class);
    }

    public function courses()
    {
        return $this->belongsTo(INP_Courses::class);
    }
}
