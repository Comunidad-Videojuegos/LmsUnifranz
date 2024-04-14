<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLink extends Model
{
    use HasFactory;

    protected $table = 'CON_ActivityLink';

    protected $fillable = [
        'ActivityId',
        'Link',
        'Meeting',
        'Material',
        'Test',
    ];

    protected $casts = [
        'ActivityId' => 'integer',
        'Link' => 'string',
        'Meeting' => 'bit',
        'Material' => 'bit',
        'Test' => 'bit'
    ];
    public function activityEvidence()
    {
        return $this->belongsTo(CON_Activity::class, 'ActivityId');
    }
}
