<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;

class CON_ActivityEvidenceType extends Model
{

    protected $table = 'CON_ActivityEvidenceType';

    protected $fillable = [
        'name',
        'description',
        'createDate',
        'updateDate',
        'deleteDate',
    ];
    public $timestamps = false;

    public function activityEvidence()
    {
        return $this->hasMany(CON_ActivityEvidence::class);
    }
}
