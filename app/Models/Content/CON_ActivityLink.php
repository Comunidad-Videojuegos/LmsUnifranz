<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLink extends Model
{
    use HasFactory;

    protected $table = 'CON_ActivityLink';

    protected $fillable = [
        'activityid',
        'link',
        'meeting',
        'material',
        'test',
    ];

    protected $casts = [
        'activityid' => 'integer',
        'link' => 'string',
        'meeting' => 'bit',
        'material' => 'bit',
        'test' => 'bit'
    ];
    public function activityEvidence()
    {
        return $this->belongsTo(CON_Activity::class, 'activityid');
    }
}
