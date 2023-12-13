<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\KelulusanSantri;
use App\Models\User;

class KelulusanSantriPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any KelulusanSantri');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, KelulusanSantri $kelulusansantri): bool
    {
        return $user->can('view KelulusanSantri');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create KelulusanSantri');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, KelulusanSantri $kelulusansantri): bool
    {
        return $user->can('update KelulusanSantri');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, KelulusanSantri $kelulusansantri): bool
    {
        return $user->can('delete KelulusanSantri');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, KelulusanSantri $kelulusansantri): bool
    {
        return $user->can('restore KelulusanSantri');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, KelulusanSantri $kelulusansantri): bool
    {
        return $user->can('force-delete KelulusanSantri');
    }
}
