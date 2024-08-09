<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;

class CON_FormFieldType extends Model
{

    protected $table = 'CON_FormFieldType';

    protected $fillable = ['name', 'color'];

    public $timestamps = false;

    public function formfiletype()
    {
        return $this->hasMany(CON_FormFieldType::class);
    }
}
