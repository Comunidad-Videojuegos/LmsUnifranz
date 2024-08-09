<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class INP_CourseInscribed extends Model
{
    use HasFactory;

    protected $table = 'INP_CourseInscribed';

    protected $fillable = [
        'courseId',
        'studentId',
        'careerId',
        'status',
        'noteTotal',
        'createDate',
        'updateDate',
        'deleteDate'
    ];

    public $timestamps = false;

    public function course()
    {
      return $this->belongsTo(INP_Course::class, 'courseId');
    }
    public function student()
    {
      return $this->belongsTo(INP_Student::class, 'studentId');
    }
    public function career()
    {
      return $this->belongsTo(INP_Career::class, 'careerId');
    }
}
