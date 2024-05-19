<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanCalification extends Model
{
    use HasFactory;

    protected $table = 'APR_PlanCalification';

    protected $fillable = [
        'name',
        'courseSectionId',
        'calification'
    ];

}
