<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSection extends Model
{
    use HasFactory;

    protected $table = 'CON_CourseSection';

    protected $fillable = [
        'courseid',
        'name',
        'assistance',
        'initdate',
        'enddate',
    ];

    protected $casts = [
        'courseid' => 'integer',
        'name' => 'string',
        'assistance' => 'bit',
        'initdate' => 'datetime',
        'enddate' => 'datetime',
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
