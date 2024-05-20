<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CON_FormField extends Model
{
    use HasFactory;

    protected $table = 'CON_FormField';

    protected $fillable = [
        'typeId',
        'formId',
        'question',
        'orderNumber'
    ];

    public $timestamps = false;
    public function formfile()
    {
        return $this->hasMany(CON_FormFields::class);
    }
    public function typefiled()
    {
        return $this->belongsTo(CON_FormFieldType::class, 'typeId');
    }
    public function form()
    {
        return $this->belongsTo(CON_Form::class, 'formId');
    }
}
