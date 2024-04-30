<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityEvidence extends Model
{
    use HasFactory;

    protected $table = 'CON_ActivityEvidence';

    protected $fillable = [
        'activityid',
        'typeid',
        'link',
        'creationdate',
        'updatedate',
        'deletedate',
    ];

    protected $casts = [
        'activityid' => 'integer',
        'typeid' => 'integer',
        'link' => 'string',
        'creationdate' => 'datetime',
        'updatedate' => 'datetime',
        'deletedate' => 'datetime:nullable',
    ];

    public function activity()
    {
        return $this->hasMany(CON_Activity::class, 'activityid');
    }

    public function type()
    {
        return $this->belongsTo(CON_ActivityType::class, 'typeid');
    }
}
