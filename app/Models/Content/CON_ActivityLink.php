<?php

namespace App\Model\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLink extends Model
{
    use HasFactory;

    protected $table = 'CON_ActivityLink';

    protected $fillable = [
        'activityId',
        'link',
        'meeting',
        'material',
        'test',
    ];

    public function activityEvidence()
    {
        return $this->belongsTo(CON_Activity::class, 'activityid');
    }
}
