<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'tel',
        'date',
    ];

    public function user()
    {
        // Userモデルのデータを引っ張てくる
        return $this->belongsTo(User::class);
    }
}
