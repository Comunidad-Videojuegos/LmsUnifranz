<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class USR_AppSection extends Model
{
    use HasFactory;

    protected $table = 'USR_AppSection';

    protected $fillable = ['link', 'name', 'description'];

    protected $casts = [
        'link' => 'string',
        'name' => 'string', // integer, string, datetime
        'description' => 'string'
    ];

    public function permissions()
    {
        return $this->hasMany(USR_Permission::class);
    }
}
