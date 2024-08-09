<?php

namespace App\Models\Reports;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RPT_PlatformActivity extends Model
{
    use HasFactory;

    protected $table = 'RPT_PlatformActivity';

    protected $fillable = [
        'userId',
        'typeId',
        'amount',
        'createDate',
        'updateDate',
    ];

    public $timestamps = false;
}
