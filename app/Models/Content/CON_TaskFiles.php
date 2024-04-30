<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskFiles extends Model
{
    use HasFactory;

    protected $table = 'CON_TaskFiles';

    protected $fillable = [
        'taskid',
        'name',
        'creationdate',
        'updatedate',
        'deletedate',
    ];

    protected $casts = [
        'taskid' => 'interger',
        'name' => 'string',
        'creationdate' => 'datetime',
        'updatedate' => 'datetime',
        'deletedate' => 'datetime:nullable',
    ];
    public function activityEvidence()
    {
        return $this->hasMany(CON_TaskFiles::class);
    }
}
