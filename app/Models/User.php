<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Users\USR_Info;
use App\Models\Users\USR_UserRoles;
use App\Models\Integration\INP_Student;
use App\Models\Integration\INP_Instructor;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email',
    'password',
    'google_id',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function userInfo()
  {
    return $this->hasOne(USR_Info::class, 'id');
  }

  public function userRoles()
  {
    return $this->hasMany(USR_UserRoles::class, 'userId');
  }
  public function students()
  {
    return $this->hasMany(INP_Student::class, 'id');
  }
  public function instructors()
  {
    return $this->hasMany(INP_Instructor::class, 'id');
  }
}
