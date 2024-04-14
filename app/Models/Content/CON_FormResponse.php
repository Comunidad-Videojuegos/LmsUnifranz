<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormResponse extends Model
{
    use HasFactory;

    protected $table = 'CON_FormResponse';

    protected $fillable = [
        'FormID',
        'StudentId',
        'Calification',
        'Duration',
        'CreationDate',
        'UpdateDate',
        'DeleteDate',
    ];

    protected $casts = [
        'CourseSectionId' => 'integer',
        'StudentId' => 'integer',
        'Calification' => 'interger',
        'Duration' => 'time',
        'CreationDate' => 'datetime',
        'UpdateDate' => 'datetime',
        'DeleteDate' => 'datetime:nullable',
    ];

    public function Formresponse()
    {
        return $this->hasMany(CON_FormResponse::class);
    }

    public function CONform()
    {
        return $this->belongsTo(CON_Form::class, 'FormId');
    }
}
