<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityEvidence extends Model
{
    use HasFactory;

    protected $table = 'CON_ActivityEvidence';

    protected $fillable = [
        'activityId',
        'typeId',
        'link',
        'createDate',
        'updateDate',
        'deleteDate',
    ];

    public function activity()
    {
        return $this->hasMany(CON_Activity::class, 'activityId');
    }

    public function type()
    {
        return $this->belongsTo(CON_ActivityType::class, 'typeId');
    }
}
