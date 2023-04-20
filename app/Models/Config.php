<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Config extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
        'sunday',
        'start_time',
        'end_time',
    ];


  Public function user()
  {
    // Userモデルのデータを引っ張てくる
    return $this->belongsTo(User::class);
  }
}
