<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class USR_Permission extends Model
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
        return $this->hasMany(USR_RolPermissions::class);
    }

    public function appSection()
    {
        return $this->belongsTo(USR_AppSection::class, 'sectionId');
    }
}
