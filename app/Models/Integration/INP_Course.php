<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Content\CON_CourseSection;
class INP_Course extends Model
{
    use HasFactory;

    protected $table = 'INP_Course';

    protected $fillable = [
        'instructorId',
        'referenceId',
        'name',
        'mandatory',
        'initials',
        'description',
        'image',
        'groupLink'
    ];

    public $timestamps = false;

    public function courseInscribed()
    {
      return $this->hasMany(INP_CourseInscribed::class, 'courseId');
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructorId');
    }
}
