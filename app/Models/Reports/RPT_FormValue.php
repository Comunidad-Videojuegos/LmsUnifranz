<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormValue extends Model
{
    use HasFactory;

    protected $table = 'RPT_FormValue';

    protected $fillable = [
        'formFieldId',
        'formResponseId',
        'value'
    ];

}
