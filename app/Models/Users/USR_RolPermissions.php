<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class USR_RolPermission extends Model
{
  use HasFactory;

  protected $table = 'USR_RolPermissions';

  protected $fillable = ['permissionId', 'rolId'];

  protected $casts = [
    'permissionId' => 'integer',
    'rolId' => 'integer'
  ];

  public function permission()
  {
    return $this->belongsTo(USR_Permission::class, 'permissionId');
  }

  public function rol()
  {
    return $this->belongsTo(USR_Rol::class, 'rolId');
  }
}
