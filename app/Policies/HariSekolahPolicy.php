<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\HariSekolah;
use App\Models\User;

class HariSekolahPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any HariSekolah');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, HariSekolah $harisekolah): bool
    {
        return $user->can('view HariSekolah');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create HariSekolah');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, HariSekolah $harisekolah): bool
    {
        return $user->can('update HariSekolah');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, HariSekolah $harisekolah): bool
    {
        return $user->can('delete HariSekolah');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, HariSekolah $harisekolah): bool
    {
        return $user->can('restore HariSekolah');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, HariSekolah $harisekolah): bool
    {
        return $user->can('force-delete HariSekolah');
    }
}
