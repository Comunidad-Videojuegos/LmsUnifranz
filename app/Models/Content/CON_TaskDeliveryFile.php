<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CON_TaskDeliveryFile extends Model
{
    use HasFactory;

    protected $table = 'CON_TaskDeliveryFile';

    protected $fillable = [
        'deliveryId',
        'link',
        'type',
        'size'
    ];
    public $timestamps = false;

    public function formfile()
    {
        return $this->belongsTo(RPT_TaskDeliveries::class, 'deliveryId');
    }
}
