<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\SantriGaleri;
use App\Models\User;

class SantriGaleriPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any SantriGaleri');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SantriGaleri $santriGaleri): bool
    {
        return $user->can('view SantriGaleri');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create SantriGaleri');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SantriGaleri $santriGaleri): bool
    {
        return $user->can('update SantriGaleri');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SantriGaleri $santriGaleri): bool
    {
        return $user->can('delete SantriGaleri');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SantriGaleri $santriGaleri): bool
    {
        return $user->can('restore SantriGaleri');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SantriGaleri $santriGaleri): bool
    {
        return $user->can('force-delete SantriGaleri');
    }
}
