<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'USR_Permission';

    protected $fillable = ['name', 'permissionKey', 'sectionId'];

    protected $casts = [
        'name' => 'string', // integer, string, datetime
        'permissionKey' => 'string',
        'sectionId' => 'integer'
    ];

    public function rolPermissions()
    {
        return $this->hasMany(RolPermission::class);
    }

    public $timestamps = false;
    public function appSection()
    {
        return $this->belongsTo(AppSection::class, 'sectionId');
    }
}
