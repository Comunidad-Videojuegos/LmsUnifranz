<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Model;

class INP_Career extends Model
{
    protected $table = 'INP_Career';

    protected $fillable = [
        'name',
        'referenceId',
        'initials',
        'description',
        'duration',
        'createDate',
        'updateDate',
        'deleteDate'
    ];

    public $timestamps = false;

    public function courseInscribed()
    {
      return $this->hasMany(INP_CourseInscribed::class, 'careerId');
    }
}
