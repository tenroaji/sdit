<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\KamarAsrama;
use App\Models\User;

class KamarAsramaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any KamarAsrama');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, KamarAsrama $kamarasrama): bool
    {
        return $user->can('view KamarAsrama');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create KamarAsrama');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, KamarAsrama $kamarasrama): bool
    {
        return $user->can('update KamarAsrama');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, KamarAsrama $kamarasrama): bool
    {
        return $user->can('delete KamarAsrama');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, KamarAsrama $kamarasrama): bool
    {
        return $user->can('restore KamarAsrama');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, KamarAsrama $kamarasrama): bool
    {
        return $user->can('force-delete KamarAsrama');
    }
}
