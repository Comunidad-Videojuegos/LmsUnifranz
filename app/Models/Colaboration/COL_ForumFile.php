<?php

namespace App\Models\Colaboration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class COL_ForumFile extends Model
{
    use HasFactory;

    protected $table = 'COL_ForumFile';

    protected $fillable = [
        'forumId',
        'link',
        'size',
        'type',
        'name',
        'description'
    ];
    public $timestamps = false;

}
