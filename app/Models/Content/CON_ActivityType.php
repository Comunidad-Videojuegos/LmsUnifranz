<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;

class CON_ActivityType extends Model
{
    protected $table = 'CON_ActivityType';

    protected $fillable = ['name', 'decription'];

    public $timestamps = false;
    
    public function activityType()
    {
        return $this->hasMany(CON_ActivityType::class);
    }
}
