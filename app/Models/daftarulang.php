<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daftarulang extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $table = 'daftarulang';


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected static function booted()
    {
        static::saving(function ($model) {
            if (!$model->user_id) {
                $model->user_id = auth()->id(); // Mengisi user_id dengan ID pengguna yang sedang login
            }
        });
    }


}
