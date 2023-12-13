<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\MataPelajaran;
use App\Models\User;

class MataPelajaranPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any MataPelajaran');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MataPelajaran $matapelajaran): bool
    {
        return $user->can('view MataPelajaran');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create MataPelajaran');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MataPelajaran $matapelajaran): bool
    {
        return $user->can('update MataPelajaran');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MataPelajaran $matapelajaran): bool
    {
        return $user->can('delete MataPelajaran');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MataPelajaran $matapelajaran): bool
    {
        return $user->can('restore MataPelajaran');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MataPelajaran $matapelajaran): bool
    {
        return $user->can('force-delete MataPelajaran');
    }
}
