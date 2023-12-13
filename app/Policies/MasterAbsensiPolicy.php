<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\MasterAbsensi;
use App\Models\User;

class MasterAbsensiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any MasterAbsensi');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MasterAbsensi $masterabsensi): bool
    {
        return $user->can('view MasterAbsensi');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create MasterAbsensi');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MasterAbsensi $masterabsensi): bool
    {
        return $user->can('update MasterAbsensi');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MasterAbsensi $masterabsensi): bool
    {
        return $user->can('delete MasterAbsensi');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MasterAbsensi $masterabsensi): bool
    {
        return $user->can('restore MasterAbsensi');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MasterAbsensi $masterabsensi): bool
    {
        return $user->can('force-delete MasterAbsensi');
    }
}
