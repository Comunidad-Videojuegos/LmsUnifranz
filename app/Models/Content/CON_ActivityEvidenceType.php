<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityEvidenceType extends Model
{
    use HasFactory;

    protected $table = 'CON_ActivityEvidenceType';

    protected $fillable = [
        'Name',
        'Description',
        'CreationDate',
        'UpdateDate',
        'DeleteDate',
    ];

    protected $casts = [
        'Name' => 'string',
        'Description' => 'string',
        'CreationDate' => 'datetime',
        'UpdateDate' => 'datetime',
        'DeleteDate' => 'datetime:nullable',
    ];
    public function activityEvidence()
    {
        return $this->hasMany(CON_ActivityEvidence::class);
    }
}
