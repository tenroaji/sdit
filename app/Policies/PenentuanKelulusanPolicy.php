<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PenentuanKelulusan;
use App\Models\User;

class PenentuanKelulusanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any PenentuanKelulusan');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PenentuanKelulusan $penentuankelulusan): bool
    {
        return $user->can('view PenentuanKelulusan');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create PenentuanKelulusan');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PenentuanKelulusan $penentuankelulusan): bool
    {
        return $user->can('update PenentuanKelulusan');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PenentuanKelulusan $penentuankelulusan): bool
    {
        return $user->can('delete PenentuanKelulusan');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PenentuanKelulusan $penentuankelulusan): bool
    {
        return $user->can('restore PenentuanKelulusan');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PenentuanKelulusan $penentuankelulusan): bool
    {
        return $user->can('force-delete PenentuanKelulusan');
    }
}
