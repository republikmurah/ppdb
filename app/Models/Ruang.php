<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Relasi dengan model User
    public function user()
{
    return $this->belongsTo(User::class);
}
}
