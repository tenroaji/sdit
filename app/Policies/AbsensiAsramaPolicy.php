<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\AbsensiAsrama;
use App\Models\User;

class AbsensiAsramaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any AbsensiAsrama');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AbsensiAsrama $absensiasrama): bool
    {
        return $user->can('view AbsensiAsrama');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create AbsensiAsrama');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AbsensiAsrama $absensiasrama): bool
    {
        return $user->can('update AbsensiAsrama');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AbsensiAsrama $absensiasrama): bool
    {
        return $user->can('delete AbsensiAsrama');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AbsensiAsrama $absensiasrama): bool
    {
        return $user->can('restore AbsensiAsrama');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AbsensiAsrama $absensiasrama): bool
    {
        return $user->can('force-delete AbsensiAsrama');
    }
}
