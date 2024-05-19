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
        'createDate',
        'updateDate',
        'deleteDate',
    ];
    
    public function activityEvidence()
    {
        return $this->hasMany(CON_ActivityEvidence::class);
    }
}
