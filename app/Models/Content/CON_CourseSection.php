<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSection extends Model
{
    use HasFactory;

    protected $table = 'CON_CourseSection';

    protected $fillable = [
        'CourseId',
        'Name',
        'Assistance',
        'InitDate',
        'EndDate',
    ];

    protected $casts = [
        'CourseId' => 'integer',
        'Name' => 'string',
        'Assistance' => 'bit',
        'InitDate' => 'datetime',
        'EndDate' => 'datetime',
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
