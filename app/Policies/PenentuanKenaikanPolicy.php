<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PenentuanKenaikan;
use App\Models\User;

class PenentuanKenaikanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any PenentuanKenaikan');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PenentuanKenaikan $penentuankenaikan): bool
    {
        return $user->can('view PenentuanKenaikan');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create PenentuanKenaikan');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PenentuanKenaikan $penentuankenaikan): bool
    {
        return $user->can('update PenentuanKenaikan');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PenentuanKenaikan $penentuankenaikan): bool
    {
        return $user->can('delete PenentuanKenaikan');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PenentuanKenaikan $penentuankenaikan): bool
    {
        return $user->can('restore PenentuanKenaikan');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PenentuanKenaikan $penentuankenaikan): bool
    {
        return $user->can('force-delete PenentuanKenaikan');
    }
}
