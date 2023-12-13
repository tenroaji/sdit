<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\AsramaSantri;
use App\Models\User;

class AsramaSantriPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any AsramaSantri');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AsramaSantri $asramasantri): bool
    {
        return $user->can('view AsramaSantri');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create AsramaSantri');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AsramaSantri $asramasantri): bool
    {
        return $user->can('update AsramaSantri');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AsramaSantri $asramasantri): bool
    {
        return $user->can('delete AsramaSantri');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AsramaSantri $asramasantri): bool
    {
        return $user->can('restore AsramaSantri');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AsramaSantri $asramasantri): bool
    {
        return $user->can('force-delete AsramaSantri');
    }
}
