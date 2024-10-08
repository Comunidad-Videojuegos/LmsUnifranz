<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RPT_FormFieldsResponse extends Model
{
    use HasFactory;

    protected $table = 'RPT_FormFieldsResponse';

    protected $fillable = [
        'formFieldId',
        'correct',
        'response'
    ];

    public $timestamps = false;
}
