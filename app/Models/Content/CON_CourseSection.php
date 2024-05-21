<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Integration\INP_Course;

class CON_CourseSection extends Model
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

    public $timestamps = false;

    public function CourseSection()
    {
        return $this->hasMany(CON_CourseSection::class);
    }

    public function course()
    {
        return $this->belongsTo(INP_Course::class, 'courseId');
    }
}
