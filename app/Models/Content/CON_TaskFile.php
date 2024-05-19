<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskFile extends Model
{
    use HasFactory;

    protected $table = 'CON_TaskFile';

    protected $fillable = [
        'taskId',
        'name',
        'createDate',
        'updatedate',
        'deletedate',
    ];

    public function activityEvidence()
    {
        return $this->hasMany(CON_TaskFiles::class);
    }
}
