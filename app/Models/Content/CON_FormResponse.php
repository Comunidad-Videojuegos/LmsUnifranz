<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormResponse extends Model
{
    use HasFactory;

    protected $table = 'CON_FormResponse';

    protected $fillable = [
        'formid',
        'studentid',
        'calification',
        'duration',
        'creationdate',
        'updatedate',
        'deletedate',
    ];

    protected $casts = [
        'formid' => 'integer',
        'studentid' => 'integer',
        'calification' => 'interger',
        'duration' => 'time',
        'creationdate' => 'datetime',
        'updatedate' => 'datetime',
        'deletedate' => 'datetime:nullable',
    ];

    public function Formresponse()
    {
        return $this->hasMany(CON_FormResponse::class);
    }

    public function CONform()
    {
        return $this->belongsTo(CON_Form::class, 'formid');
    }
}
