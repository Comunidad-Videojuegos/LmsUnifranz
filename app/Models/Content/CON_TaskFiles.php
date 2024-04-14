<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskFiles extends Model
{
    use HasFactory;

    protected $table = 'CON_TaskFiles';

    protected $fillable = [
        'TaskId',
        'Name',
        'CreationDate',
        'UpdateDate',
        'DeleteDate',
    ];

    protected $casts = [
        'TaskId' => 'interger',
        'Name' => 'string',
        'CreationDate' => 'datetime',
        'UpdateDate' => 'datetime',
        'DeleteDate' => 'datetime:nullable',
    ];
    public function activityEvidence()
    {
        return $this->hasMany(CON_TaskFiles::class);
    }
}
