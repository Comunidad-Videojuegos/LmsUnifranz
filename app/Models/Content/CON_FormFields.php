<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormFields extends Model
{
    use HasFactory;

    protected $table = 'CON_FormFields';

    protected $fillable = [
        'typeid',
        'formid',
        'question',
        'ordernumber'
    ];

    protected $casts = [
        'typeid' => 'integer',
        'formid' => 'integer',
        'question' => 'string',
        'ordernumber' => 'integer'
    ];
    public function formfile()
    {
        return $this->hasMany(CON_FormFields::class);
    }
    public function typefiled()
    {
        return $this->belongsTo(CON_FormFieldType::class, 'typeid');
    }
    public function form()
    {
        return $this->belongsTo(CON_Form::class, 'formid');
    }
}
