<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\JenisJabatan;
use App\Models\User;

class JenisJabatanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any JenisJabatan');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JenisJabatan $jenisjabatan): bool
    {
        return $user->can('view JenisJabatan');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create JenisJabatan');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JenisJabatan $jenisjabatan): bool
    {
        return $user->can('update JenisJabatan');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JenisJabatan $jenisjabatan): bool
    {
        return $user->can('delete JenisJabatan');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JenisJabatan $jenisjabatan): bool
    {
        return $user->can('restore JenisJabatan');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JenisJabatan $jenisjabatan): bool
    {
        return $user->can('force-delete JenisJabatan');
    }
}
