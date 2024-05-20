<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CON_ActivityLink extends Model
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

    public $timestamps = false;

    public function activityEvidence()
    {
        return $this->belongsTo(CON_Activity::class, 'activityid');
    }
}
