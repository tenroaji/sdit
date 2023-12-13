<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Santri;
use App\Models\User;

class SantriPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Santri');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Santri $santri): bool
    {
        return $user->can('view Santri');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Santri');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Santri $santri): bool
    {
        return $user->can('update Santri');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Santri $santri): bool
    {
        return $user->can('delete Santri');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Santri $santri): bool
    {
        return $user->can('restore Santri');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Santri $santri): bool
    {
        return $user->can('force-delete Santri');
    }
}
