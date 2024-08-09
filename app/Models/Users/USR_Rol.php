<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class USR_Rol extends Model
{
  protected $table = 'USR_Rol';

  protected $fillable = ['name', 'createDate', 'updateDate', 'deleteDate'];

  protected $casts = [
    'createDate' => 'datetime',
    'updateDate' => 'datetime',
    'deleteDate' => 'datetime',
    'name' => 'string'
  ];

  public $timestamps = false;
  public function userRoles()
  {
    return $this->hasMany(UserRoles::class);
  }

  public function rolPermissions()
  {
    return $this->hasMany(RolPermissions::class);
  }
}
