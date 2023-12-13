<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\JamSekolah;
use App\Models\User;

class JamSekolahPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any JamSekolah');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JamSekolah $jamsekolah): bool
    {
        return $user->can('view JamSekolah');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create JamSekolah');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JamSekolah $jamsekolah): bool
    {
        return $user->can('update JamSekolah');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JamSekolah $jamsekolah): bool
    {
        return $user->can('delete JamSekolah');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JamSekolah $jamsekolah): bool
    {
        return $user->can('restore JamSekolah');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JamSekolah $jamsekolah): bool
    {
        return $user->can('force-delete JamSekolah');
    }
}
