<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\SantriReport;
use App\Models\User;

class SantriReportPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any SantriReport');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SantriReport $santrireport): bool
    {
        return $user->can('view SantriReport');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create SantriReport');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SantriReport $santrireport): bool
    {
        return $user->can('update SantriReport');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SantriReport $santrireport): bool
    {
        return $user->can('delete SantriReport');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SantriReport $santrireport): bool
    {
        return $user->can('restore SantriReport');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SantriReport $santrireport): bool
    {
        return $user->can('force-delete SantriReport');
    }
}
