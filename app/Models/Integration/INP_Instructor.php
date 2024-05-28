<?php

namespace App\Models\Integration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class INP_Instructor extends Model
{
    use HasFactory;

    protected $table = 'INP_Instructor';

    protected $fillable = [
        'id',
        'speciality',
        'type'
    ];

    public $timestamps = false;
    
    public function info()
    {
      return $this->belongsTo(USR_Info::class, 'id', 'id');
    }
}
