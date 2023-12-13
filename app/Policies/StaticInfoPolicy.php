<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\StaticInfo;
use App\Models\User;

class StaticInfoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any StaticInfo');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, StaticInfo $staticinfo): bool
    {
        return $user->can('view StaticInfo');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create StaticInfo');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, StaticInfo $staticinfo): bool
    {
        return $user->can('update StaticInfo');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, StaticInfo $staticinfo): bool
    {
        return $user->can('delete StaticInfo');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, StaticInfo $staticinfo): bool
    {
        return $user->can('restore StaticInfo');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, StaticInfo $staticinfo): bool
    {
        return $user->can('force-delete StaticInfo');
    }
}
