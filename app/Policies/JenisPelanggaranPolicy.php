<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\JenisPelanggaran;
use App\Models\User;

class JenisPelanggaranPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any JenisPelanggaran');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JenisPelanggaran $jenispelanggaran): bool
    {
        return $user->can('view JenisPelanggaran');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create JenisPelanggaran');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JenisPelanggaran $jenispelanggaran): bool
    {
        return $user->can('update JenisPelanggaran');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JenisPelanggaran $jenispelanggaran): bool
    {
        return $user->can('delete JenisPelanggaran');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JenisPelanggaran $jenispelanggaran): bool
    {
        return $user->can('restore JenisPelanggaran');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JenisPelanggaran $jenispelanggaran): bool
    {
        return $user->can('force-delete JenisPelanggaran');
    }
}
