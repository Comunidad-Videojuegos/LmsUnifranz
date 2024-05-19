<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormFieldType extends Model
{
    use HasFactory;

    protected $table = 'CON_FormFieldType';

    protected $fillable = ['name', 'color'];

    public function formfiletype()
    {
        return $this->hasMany(CON_FormFieldType::class);
    }
}
