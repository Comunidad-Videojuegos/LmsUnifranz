<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityEvidenceType extends Model
{
    use HasFactory;

    protected $table = 'CON_ActivityEvidenceType';

    protected $fillable = [
        'name',
        'description',
        'creationdate',
        'updatedate',
        'deletedate',
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'creationdate' => 'datetime',
        'updatedate' => 'datetime',
        'deletedate' => 'datetime:nullable',
    ];
    public function activityEvidence()
    {
        return $this->hasMany(CON_ActivityEvidence::class);
    }
}
