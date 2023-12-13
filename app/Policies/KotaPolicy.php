<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Kota;
use App\Models\User;

class KotaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Kota');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Kota $kota): bool
    {
        return $user->can('view Kota');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Kota');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Kota $kota): bool
    {
        return $user->can('update Kota');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Kota $kota): bool
    {
        return $user->can('delete Kota');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Kota $kota): bool
    {
        return $user->can('restore Kota');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Kota $kota): bool
    {
        return $user->can('force-delete Kota');
    }
}
