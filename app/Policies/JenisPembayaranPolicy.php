<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\JenisPembayaran;
use App\Models\User;

class JenisPembayaranPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any JenisPembayaran');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JenisPembayaran $jenispembayaran): bool
    {
        return $user->can('view JenisPembayaran');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create JenisPembayaran');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JenisPembayaran $jenispembayaran): bool
    {
        return $user->can('update JenisPembayaran');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JenisPembayaran $jenispembayaran): bool
    {
        return $user->can('delete JenisPembayaran');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JenisPembayaran $jenispembayaran): bool
    {
        return $user->can('restore JenisPembayaran');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JenisPembayaran $jenispembayaran): bool
    {
        return $user->can('force-delete JenisPembayaran');
    }
}
