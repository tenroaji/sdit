<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\MasterPembelian;
use App\Models\User;

class MasterPembelianPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any MasterPembelian');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MasterPembelian $masterpembelian): bool
    {
        return $user->can('view MasterPembelian');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create MasterPembelian');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MasterPembelian $masterpembelian): bool
    {
        return $user->can('update MasterPembelian');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MasterPembelian $masterpembelian): bool
    {
        return $user->can('delete MasterPembelian');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MasterPembelian $masterpembelian): bool
    {
        return $user->can('restore MasterPembelian');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MasterPembelian $masterpembelian): bool
    {
        return $user->can('force-delete MasterPembelian');
    }
}
