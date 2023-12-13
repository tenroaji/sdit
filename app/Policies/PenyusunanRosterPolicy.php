<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PenyusunanRoster;
use App\Models\User;

class PenyusunanRosterPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any PenyusunanRoster');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PenyusunanRoster $penyusunanroster): bool
    {
        return $user->can('view PenyusunanRoster');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create PenyusunanRoster');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PenyusunanRoster $penyusunanroster): bool
    {
        return $user->can('update PenyusunanRoster');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PenyusunanRoster $penyusunanroster): bool
    {
        return $user->can('delete PenyusunanRoster');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PenyusunanRoster $penyusunanroster): bool
    {
        return $user->can('restore PenyusunanRoster');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PenyusunanRoster $penyusunanroster): bool
    {
        return $user->can('force-delete PenyusunanRoster');
    }
}
