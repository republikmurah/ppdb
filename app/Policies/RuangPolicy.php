<?php

namespace App\Policies;

use App\Models\User;

class RuangPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        // Cek apakah pengguna memiliki izin untuk melihat daftar ruang
        return $user->hasRole('admin') || $user->hasPermissionTo('view_any_ruang');
    }

    /**
     * Determine if the user can view the room.
     */
    public function view(User $user, Ruang $ruang)
    {
        // Cek apakah pengguna memiliki izin untuk melihat ruang tertentu
        return $user->hasRole('admin') || $user->hasPermissionTo('view_ruang') || $user->id === $ruang->user_id;
    }

    /**
     * Determine if the user can create a room.
     */
    public function create(User $user)
    {
        // Cek apakah pengguna memiliki izin untuk membuat ruang
        return $user->hasRole('admin') || $user->hasPermissionTo('create_ruang');
    }

    public function __construct()
    {
        //
    }
}
