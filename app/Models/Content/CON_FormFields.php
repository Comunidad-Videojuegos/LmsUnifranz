<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormFields extends Model
{
    use HasFactory;

    protected $table = 'CON_FormFields';

    protected $fillable = [
        'TypeId',
        'FormId',
        'Question',
        'OrderNumber'
    ];

    protected $casts = [
        'TypeId' => 'integer',
        'FormId' => 'integer',
        'Question' => 'string',
        'OrderNumber' => 'integer'
    ];
    public function formfile()
    {
        return $this->hasMany(CON_FormFields::class);
    }
    public function typefiled()
    {
        return $this->belongsTo(CON_FormFieldType::class, 'TypeId');
    }
    public function form()
    {
        return $this->belongsTo(CON_Form::class, 'FormId');
    }
}
