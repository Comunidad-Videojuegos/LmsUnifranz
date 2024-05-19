<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDeliveryFile extends Model
{
    use HasFactory;

    protected $table = 'CON_TaskDeliveryFile';

    protected $fillable = [
        'deliveryId',
        'link',
        'type',
        'size'
    ];

    public function formfile()
    {
        return $this->belongsTo(RPT_TaskDeliveries::class, 'deliveryId');
    }
}
