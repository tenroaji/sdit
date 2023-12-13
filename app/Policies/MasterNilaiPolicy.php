<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\MasterNilai;
use App\Models\User;

class MasterNilaiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any MasterNilai');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MasterNilai $masternilai): bool
    {
        return $user->can('view MasterNilai');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create MasterNilai');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MasterNilai $masternilai): bool
    {
        return $user->can('update MasterNilai');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MasterNilai $masternilai): bool
    {
        return $user->can('delete MasterNilai');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MasterNilai $masternilai): bool
    {
        return $user->can('restore MasterNilai');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MasterNilai $masternilai): bool
    {
        return $user->can('force-delete MasterNilai');
    }
}
