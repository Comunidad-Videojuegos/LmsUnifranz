<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormFieldType extends Model
{
    use HasFactory;

    protected $table = 'CON_FormFieldType';

    protected $fillable = ['name', 'color'];

    protected $casts = [
        'name' => 'string',
        'color' => 'string'
    ];

    public function formfiletype()
    {
        return $this->hasMany(CON_FormFieldType::class);
    }
}
