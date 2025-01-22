<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
