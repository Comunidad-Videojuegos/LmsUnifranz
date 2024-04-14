<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDeliveryFiles extends Model
{
    use HasFactory;

    protected $table = 'CON_TaskDeliveryFiles';

    protected $fillable = [
        'DeliveryId',
        'LinkFile',
        'TypeFile',
        'SizeFile'
    ];

    protected $casts = [
        'DeliveryId' => 'integer',
        'LinkFile' => 'string',
        'TypeFile' => 'string',
        'SizeFile' => 'integer'
    ];
    public function formfile()
    {
        return $this->belongsTo(RPT_TaskDeliveries::class, 'DeliveryId');
    }
}
