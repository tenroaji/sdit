<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Kelas;
use App\Models\User;

class KelasPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Kelas');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Kelas $kelas): bool
    {
        return $user->can('view Kelas');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Kelas');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Kelas $kelas): bool
    {
        return $user->can('update Kelas');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Kelas $kelas): bool
    {
        return $user->can('delete Kelas');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Kelas $kelas): bool
    {
        return $user->can('restore Kelas');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Kelas $kelas): bool
    {
        return $user->can('force-delete Kelas');
    }
}
