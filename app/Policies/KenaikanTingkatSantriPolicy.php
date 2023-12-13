<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\KenaikanTingkatSantri;
use App\Models\User;

class KenaikanTingkatSantriPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any KenaikanTingkatSantri');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, KenaikanTingkatSantri $kenaikantingkatsantri): bool
    {
        return $user->can('view KenaikanTingkatSantri');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create KenaikanTingkatSantri');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, KenaikanTingkatSantri $kenaikantingkatsantri): bool
    {
        return $user->can('update KenaikanTingkatSantri');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, KenaikanTingkatSantri $kenaikantingkatsantri): bool
    {
        return $user->can('delete KenaikanTingkatSantri');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, KenaikanTingkatSantri $kenaikantingkatsantri): bool
    {
        return $user->can('restore KenaikanTingkatSantri');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, KenaikanTingkatSantri $kenaikantingkatsantri): bool
    {
        return $user->can('force-delete KenaikanTingkatSantri');
    }
}
