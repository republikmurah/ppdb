<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;



class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'periode_id',
        'ruang_id',
        'daftarulang_id', // Pastikan ada jika relasi belongsTo tetap digunakan

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function periode()
{
    return $this->belongsTo(Periode::class, 'periode_id');
}

public function pendaftaran()
{
    return $this->belongsTo(Pendaftaran::class, 'pendaftaran_id');
}

public function daftarulang()
{
    // return $this->belongsTo(DaftarUlang::class, 'daftarulang_id');
    return $this->hasOne(DaftarUlang::class, 'user_id', 'id');

}



public function ruang()
{
    return $this->belongsTo(Ruang::class, 'ruang_id');
}

// public function roles()
// {
//     return $this->belongsToMany(Role::class);
// }



}
