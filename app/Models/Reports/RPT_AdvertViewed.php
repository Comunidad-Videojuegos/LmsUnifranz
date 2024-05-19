<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertViewed extends Model
{
    use HasFactory;

    protected $table = 'RPT_AdvertViewed';

    protected $fillable = [
        'advertId',
        'userId',
        'viewed',
        'createDate'
    ];

}
