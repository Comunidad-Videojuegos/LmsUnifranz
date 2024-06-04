<?php

namespace App\Models\Colaboration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class COL_Forum extends Model
{
    use HasFactory;

    protected $table = 'COL_Forum';

    protected $fillable = [
        'header',
        'content',
        'valoration',
        'courseSectionId',
        'orderNumber',
        'createDate',
        'updateDate',
        'deleteDate'
    ];
    public $timestamps = false;


}
