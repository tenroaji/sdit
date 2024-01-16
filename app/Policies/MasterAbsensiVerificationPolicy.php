<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\MasterAbsensiVerification;
use App\Models\User;

class MasterAbsensiVerificationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any MasterAbsensiVerification');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MasterAbsensiVerification $MasterAbsensiVerification): bool
    {
        return $user->can('view MasterAbsensiVerification');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create MasterAbsensiVerification');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MasterAbsensiVerification $MasterAbsensiVerification): bool
    {
        return $user->can('update MasterAbsensiVerification');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MasterAbsensiVerification $MasterAbsensiVerification): bool
    {
        return $user->can('delete MasterAbsensiVerification');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MasterAbsensiVerification $MasterAbsensiVerification): bool
    {
        return $user->can('restore MasterAbsensiVerification');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MasterAbsensiVerification $MasterAbsensiVerification): bool
    {
        return $user->can('force-delete MasterAbsensiVerification');
    }
}
