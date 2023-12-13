<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\GuruMataPelajaran;
use App\Models\User;

class GuruMataPelajaranPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any GuruMataPelajaran');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, GuruMataPelajaran $gurumatapelajaran): bool
    {
        return $user->can('view GuruMataPelajaran');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create GuruMataPelajaran');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, GuruMataPelajaran $gurumatapelajaran): bool
    {
        return $user->can('update GuruMataPelajaran');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, GuruMataPelajaran $gurumatapelajaran): bool
    {
        return $user->can('delete GuruMataPelajaran');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, GuruMataPelajaran $gurumatapelajaran): bool
    {
        return $user->can('restore GuruMataPelajaran');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, GuruMataPelajaran $gurumatapelajaran): bool
    {
        return $user->can('force-delete GuruMataPelajaran');
    }
}
