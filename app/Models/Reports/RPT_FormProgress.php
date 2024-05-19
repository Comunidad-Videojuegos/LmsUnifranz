<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormProgress extends Model
{
    use HasFactory;

    protected $table = 'RPT_FormProgress';

    protected $fillable = [
        'responseId',
        'numField',
        'corrects',
        'incorrects'
    ];

}
