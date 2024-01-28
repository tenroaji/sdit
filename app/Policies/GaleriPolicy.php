<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Galeri;
use App\Models\User;

class GaleriPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Galeri');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Galeri $Galeri): bool
    {
        return $user->can('view Galeri');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Galeri');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Galeri $Galeri): bool
    {
        return $user->can('update Galeri');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Galeri $Galeri): bool
    {
        return $user->can('delete Galeri');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Galeri $Galeri): bool
    {
        return $user->can('restore Galeri');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Galeri $Galeri): bool
    {
        return $user->can('force-delete Galeri');
    }
}
