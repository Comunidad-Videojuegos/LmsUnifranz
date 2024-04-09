<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class USR_Rol extends Model
{
  use HasFactory;
  protected $table = 'USR_Rol';

  protected $fillable = ['name', 'createDate', 'updateDate', 'deleteDate'];

  protected $casts = [
    'createDate' => 'datetime',
    'updateDate' => 'datetime',
    'deleteDate' => 'datetime',
    'name' => 'string'
  ];

  public function userRoles()
  {
    return $this->hasMany(USR_UserRoles::class);
  }

  public function rolPermissions()
  {
    return $this->hasMany(USR_RolPermissions::class);
  }
}
