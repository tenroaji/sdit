<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\HubungiKami;
use App\Models\User;

class HubungiKamiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any HubungiKami');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, HubungiKami $hubungikami): bool
    {
        return $user->can('view HubungiKami');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create HubungiKami');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, HubungiKami $hubungikami): bool
    {
        return $user->can('update HubungiKami');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, HubungiKami $hubungikami): bool
    {
        return $user->can('delete HubungiKami');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, HubungiKami $hubungikami): bool
    {
        return $user->can('restore HubungiKami');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, HubungiKami $hubungikami): bool
    {
        return $user->can('force-delete HubungiKami');
    }
}
