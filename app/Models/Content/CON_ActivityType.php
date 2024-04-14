<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activityType extends Model
{
    use HasFactory;

    protected $table = 'CON_ActivityType';

    protected $fillable = ['name', 'decription'];

    protected $casts = [
        'name' => 'string',
        'decription' => 'string'
    ];

    public function activityType()
    {
        return $this->hasMany(CON_ActivityType::class);
    }
}
