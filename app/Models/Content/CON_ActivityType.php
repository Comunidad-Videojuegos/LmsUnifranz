<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activityType extends Model
{
    use HasFactory;

    protected $table = 'CON_ActivityType';

    protected $fillable = ['name', 'decription'];

    public function activityType()
    {
        return $this->hasMany(CON_ActivityType::class);
    }
}
