<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class USR_UserRole extends Model
{
    use HasFactory;

    protected $table = 'USR_UserRoles';

    protected $fillable = ['userId', 'rolId', 'name', 'createDate','updateDate', 'deleteDate'];

    protected $casts = [
        'createDate' => 'datetime',
        'updateDate' => 'datetime',
        'deleteDate' => 'datetime',
        'name' => 'string',
        'userId' => 'integer',
        'rolId' => 'integer'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function rol()
    {
        return $this->belongsTo(USR_Rol::class, 'rolId');
    }
}
