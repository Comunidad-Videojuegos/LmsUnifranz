<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CON_FormResponse extends Model
{
    use HasFactory;

    protected $table = 'CON_FormResponse';

    protected $fillable = [
        'formId',
        'studentId',
        'calification',
        'duration',
        'createDate',
        'updateDate',
        'deleteDate',
    ];

    public $timestamps = false;

    public function Formresponse()
    {
        return $this->hasMany(CON_FormResponse::class);
    }

    public function CONform()
    {
        return $this->belongsTo(CON_Form::class, 'formid');
    }
}
