<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Strata;
use App\Models\User;

class StrataPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Strata');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Strata $strata): bool
    {
        return $user->can('view Strata');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Strata');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Strata $strata): bool
    {
        return $user->can('update Strata');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Strata $strata): bool
    {
        return $user->can('delete Strata');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Strata $strata): bool
    {
        return $user->can('restore Strata');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Strata $strata): bool
    {
        return $user->can('force-delete Strata');
    }
}
