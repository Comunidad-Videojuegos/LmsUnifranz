<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class USR_Info extends Model
{
  use HasFactory;

  protected $table = 'USR_Info';

  protected $fillable = ['firstName', 'dadLastName', 'momLastName','age', 'ci'];

  protected $casts = [
    'firstName' => 'string',
    'momLastName' => 'string',
    'dadLastName' => 'string',
    'age' => 'integer',
    'ci' => 'integer',
  ];

  public $timestamps = false;
  
  public function user()
  {
    return $this->belongsTo(User::class, 'id');
  }
}
