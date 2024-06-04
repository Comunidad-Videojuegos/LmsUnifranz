<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Integration\INP_Student;

class USR_Info extends Model
{
  use HasFactory;

  protected $table = 'USR_Info';

  protected $fillable = ['id', 'firstName', 'photo', 'dadLastName', 'momLastName','age', 'ci'];

  public $timestamps = false;

  public function user()
  {
    return $this->belongsTo(User::class, 'id', 'id');
  }

  public function student()
  {
    return $this->hasOne(INP_Student::class, 'id');
  }

  public function courseInscribed()
  {
    return $this->hasMany(INP_CourseInscribed::class, 'studentId');
  }
}
