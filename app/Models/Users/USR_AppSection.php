<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class USR_AppSection extends Model
{
    use HasFactory;

    protected $table = 'USR_AppSection';

    protected $fillable = ['link', 'name', 'description', 'icon', 'group'];

    protected $casts = [
        'link' => 'string',
        'name' => 'string', // integer, string, datetime
        'description' => 'string',
        'icon' => 'string',
        'group' => 'integer'
    ];

    public $timestamps = false;
    public function permissions()
    {
        return $this->hasMany(USR_Permission::class);
    }
}
