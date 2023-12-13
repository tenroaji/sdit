<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\JadwalPulang;
use App\Models\User;

class JadwalPulangPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any JadwalPulang');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JadwalPulang $jadwalpulang): bool
    {
        return $user->can('view JadwalPulang');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create JadwalPulang');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JadwalPulang $jadwalpulang): bool
    {
        return $user->can('update JadwalPulang');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JadwalPulang $jadwalpulang): bool
    {
        return $user->can('delete JadwalPulang');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JadwalPulang $jadwalpulang): bool
    {
        return $user->can('restore JadwalPulang');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JadwalPulang $jadwalpulang): bool
    {
        return $user->can('force-delete JadwalPulang');
    }
}
