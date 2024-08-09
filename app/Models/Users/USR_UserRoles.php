<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class USR_UserRoles extends Model
{
    protected $table = 'USR_UserRoles';

    protected $fillable = ['userId', 'rolId', 'createDate','updateDate', 'deleteDate'];

    protected $casts = [
        'createDate' => 'datetime',
        'updateDate' => 'datetime',
        'deleteDate' => 'datetime',
        'userId' => 'integer',
        'rolId' => 'integer'
    ];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rolId');
    }
}
