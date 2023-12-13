<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\KegiatanSantri;
use App\Models\User;

class KegiatanSantriPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any KegiatanSantri');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, KegiatanSantri $kegiatansantri): bool
    {
        return $user->can('view KegiatanSantri');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create KegiatanSantri');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, KegiatanSantri $kegiatansantri): bool
    {
        return $user->can('update KegiatanSantri');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, KegiatanSantri $kegiatansantri): bool
    {
        return $user->can('delete KegiatanSantri');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, KegiatanSantri $kegiatansantri): bool
    {
        return $user->can('restore KegiatanSantri');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, KegiatanSantri $kegiatansantri): bool
    {
        return $user->can('force-delete KegiatanSantri');
    }
}
