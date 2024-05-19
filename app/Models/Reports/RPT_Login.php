<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;

    protected $table = 'RPT_Login';

    protected $fillable = [
        'userId',
        'passCorrect',
        'nameCorrect',
        'createDate'
    ];

}
