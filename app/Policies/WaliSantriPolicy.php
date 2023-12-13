<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\WaliSantri;
use App\Models\User;

class WaliSantriPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any WaliSantri');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, WaliSantri $walisantri): bool
    {
        return $user->can('view WaliSantri');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create WaliSantri');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, WaliSantri $walisantri): bool
    {
        return $user->can('update WaliSantri');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, WaliSantri $walisantri): bool
    {
        return $user->can('delete WaliSantri');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, WaliSantri $walisantri): bool
    {
        return $user->can('restore WaliSantri');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, WaliSantri $walisantri): bool
    {
        return $user->can('force-delete WaliSantri');
    }
}
