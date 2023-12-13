<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\DaftarSurah;
use App\Models\User;

class DaftarSurahPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any DaftarSurah');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DaftarSurah $daftarsurah): bool
    {
        return $user->can('view DaftarSurah');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create DaftarSurah');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, DaftarSurah $daftarsurah): bool
    {
        return $user->can('update DaftarSurah');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, DaftarSurah $daftarsurah): bool
    {
        return $user->can('delete DaftarSurah');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DaftarSurah $daftarsurah): bool
    {
        return $user->can('restore DaftarSurah');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DaftarSurah $daftarsurah): bool
    {
        return $user->can('force-delete DaftarSurah');
    }
}
