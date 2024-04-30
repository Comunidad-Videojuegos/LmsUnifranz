<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDeliveryFiles extends Model
{
    use HasFactory;

    protected $table = 'CON_TaskDeliveryFiles';

    protected $fillable = [
        'deliveryid',
        'linkfile',
        'typefile',
        'sizefile'
    ];

    protected $casts = [
        'deliveryid' => 'integer',
        'linkfile' => 'string',
        'typefile' => 'string',
        'sizefile' => 'integer'
    ];
    public function formfile()
    {
        return $this->belongsTo(RPT_TaskDeliveries::class, 'deliveryid');
    }
}
