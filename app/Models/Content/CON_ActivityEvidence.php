<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityEvidence extends Model
{
    use HasFactory;

    protected $table = 'CON_ActivityEvidence';

    protected $fillable = [
        'ActivityId',
        'TypeId',
        'Link',
        'CreationDate',
        'UpdateDate',
        'DeleteDate',
    ];

    protected $casts = [
        'ActivityId' => 'integer',
        'TypeId' => 'integer',
        'Link' => 'string',
        'CreationDate' => 'datetime',
        'UpdateDate' => 'datetime',
        'DeleteDate' => 'datetime:nullable',
    ];

    public function activity()
    {
        return $this->hasMany(CON_Activity::class, 'ActivityId');
    }

    public function type()
    {
        return $this->belongsTo(CON_ActivityType::class, 'TypeId');
    }
}
