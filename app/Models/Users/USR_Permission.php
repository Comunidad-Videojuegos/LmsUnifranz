<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class USR_Permission extends Model
{
    use HasFactory;

    protected $table = 'USR_Permission';

    protected $fillable = ['name', 'permissionKey'];

    protected $casts = [
        'name' => 'string',
        'permissionKey' => 'string'
    ];

    public function rolPermissions()
    {
        return $this->hasMany(USR_RolPermissions::class);
    }
}
