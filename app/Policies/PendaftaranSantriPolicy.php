<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PendaftaranSantri;
use App\Models\User;

class PendaftaranSantriPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any PendaftaranSantri');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PendaftaranSantri $pendaftaransantri): bool
    {
        return $user->can('view PendaftaranSantri');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create PendaftaranSantri');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PendaftaranSantri $pendaftaransantri): bool
    {
        return $user->can('update PendaftaranSantri');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PendaftaranSantri $pendaftaransantri): bool
    {
        return $user->can('delete PendaftaranSantri');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PendaftaranSantri $pendaftaransantri): bool
    {
        return $user->can('restore PendaftaranSantri');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PendaftaranSantri $pendaftaransantri): bool
    {
        return $user->can('force-delete PendaftaranSantri');
    }
}
