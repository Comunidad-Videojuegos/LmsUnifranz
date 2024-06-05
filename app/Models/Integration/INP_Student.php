<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Users\USR_Info;

class INP_Student extends Model
{
    use HasFactory;

    protected $table = 'INP_Student';

    protected $fillable = [
        'id',
        'careerId',
        'semester',
        'referenceId',
        'createDate',
        'updateDate',
        'deleteDate'
    ];
    public $timestamps = false;

    public function info()
    {
      return $this->belongsTo(USR_Info::class, 'id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id');
    }

    public function courseInscriptions()
    {
      return $this->belongsTo(INP_CourseInscribed::class, 'id', 'studentId');
    }
}
