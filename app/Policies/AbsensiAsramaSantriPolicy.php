<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\AbsensiAsramaSantri;
use App\Models\User;

class AbsensiAsramaSantriPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any AbsensiAsramaSantri');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AbsensiAsramaSantri $absensiasramasantri): bool
    {
        return $user->can('view AbsensiAsramaSantri');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create AbsensiAsramaSantri');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AbsensiAsramaSantri $absensiasramasantri): bool
    {
        return $user->can('update AbsensiAsramaSantri');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AbsensiAsramaSantri $absensiasramasantri): bool
    {
        return $user->can('delete AbsensiAsramaSantri');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AbsensiAsramaSantri $absensiasramasantri): bool
    {
        return $user->can('restore AbsensiAsramaSantri');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AbsensiAsramaSantri $absensiasramasantri): bool
    {
        return $user->can('force-delete AbsensiAsramaSantri');
    }
}
