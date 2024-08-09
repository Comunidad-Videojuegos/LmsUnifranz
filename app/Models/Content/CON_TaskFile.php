<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CON_TaskFile extends Model
{
    use HasFactory;

    protected $table = 'CON_TaskFile';

    protected $fillable = [
        'taskId',
        'link',
        'name',
        'createDate',
        'updatedate',
        'deletedate',
    ];
    public $timestamps = false;

    public function activityEvidence()
    {
        return $this->hasMany(CON_TaskFiles::class);
    }
}
