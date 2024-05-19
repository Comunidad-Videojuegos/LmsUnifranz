<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table = 'CON_Form';

    protected $fillable = [
        'courseSectionId',
        'orderNumber',
        'createUserId',
        'duration',
        'calification',
        'createDate',
        'updateDate',
        'deleteDate',
    ];


    public function Form()
    {
        return $this->hasMany(CON_Form::class);
    }

    public function Coursesection()
    {
        return $this->belongsTo(CON_CourseSection::class, 'coursesectionid');
    }
}
