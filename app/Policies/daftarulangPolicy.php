<?php

namespace App\Policies;

use App\Models\User;
use App\Models\DaftarUlang;
use Illuminate\Auth\Access\HandlesAuthorization;

class DaftarUlangPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_daftar::ulang');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DaftarUlang  $daftarUlang
     * @return bool
     */
    public function view(User $user, DaftarUlang $daftarUlang): bool
    {
        // return $user->can('view_daftar::ulang');
        // Jika pengguna adalah super_admin, mereka bisa melihat semua data
    if ($user->hasRole('super_admin')) {
        return true;
    }

        // return $user->can('view_daftarulang');
        return $user->can('view_daftar::ulang') && $daftarUlang->user_id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_daftar::ulang');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DaftarUlang  $daftarUlang
     * @return bool
     */
    public function update(User $user, DaftarUlang $daftarUlang): bool
    {
        return $user->can('update_daftar::ulang');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DaftarUlang  $daftarUlang
     * @return bool
     */
    public function delete(User $user, DaftarUlang $daftarUlang): bool
    {
        return $user->can('delete_daftar::ulang');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_daftar::ulang');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DaftarUlang  $daftarUlang
     * @return bool
     */
    public function forceDelete(User $user, DaftarUlang $daftarUlang): bool
    {
        return $user->can('force_delete_daftar::ulang');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_daftar::ulang');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DaftarUlang  $daftarUlang
     * @return bool
     */
    public function restore(User $user, DaftarUlang $daftarUlang): bool
    {
        return $user->can('restore_daftar::ulang');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_daftar::ulang');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\DaftarUlang  $daftarUlang
     * @return bool
     */
    public function replicate(User $user, DaftarUlang $daftarUlang): bool
    {
        return $user->can('replicate_daftar::ulang');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_daftar::ulang');
    }

}
