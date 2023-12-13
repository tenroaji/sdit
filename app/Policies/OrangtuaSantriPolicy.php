<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\OrangtuaSantri;
use App\Models\User;

class OrangtuaSantriPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any OrangtuaSantri');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, OrangtuaSantri $orangtuasantri): bool
    {
        return $user->can('view OrangtuaSantri');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create OrangtuaSantri');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, OrangtuaSantri $orangtuasantri): bool
    {
        return $user->can('update OrangtuaSantri');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, OrangtuaSantri $orangtuasantri): bool
    {
        return $user->can('delete OrangtuaSantri');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, OrangtuaSantri $orangtuasantri): bool
    {
        return $user->can('restore OrangtuaSantri');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, OrangtuaSantri $orangtuasantri): bool
    {
        return $user->can('force-delete OrangtuaSantri');
    }
}
