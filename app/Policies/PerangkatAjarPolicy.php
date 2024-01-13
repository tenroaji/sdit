<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PerangkatAjar;
use App\Models\User;

class PerangkatAjarPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any PerangkatAjar');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PerangkatAjar $PerangkatAjar): bool
    {
        return $user->can('view PerangkatAjar');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create PerangkatAjar');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PerangkatAjar $PerangkatAjar): bool
    {
        return $user->can('update PerangkatAjar');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PerangkatAjar $PerangkatAjar): bool
    {
        return $user->can('delete PerangkatAjar');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PerangkatAjar $PerangkatAjar): bool
    {
        return $user->can('restore PerangkatAjar');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PerangkatAjar $PerangkatAjar): bool
    {
        return $user->can('force-delete PerangkatAjar');
    }
}
