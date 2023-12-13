<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Tingkat;
use App\Models\User;

class TingkatPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Tingkat');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Tingkat $tingkat): bool
    {
        return $user->can('view Tingkat');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Tingkat');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Tingkat $tingkat): bool
    {
        return $user->can('update Tingkat');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Tingkat $tingkat): bool
    {
        return $user->can('delete Tingkat');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Tingkat $tingkat): bool
    {
        return $user->can('restore Tingkat');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Tingkat $tingkat): bool
    {
        return $user->can('force-delete Tingkat');
    }
}
