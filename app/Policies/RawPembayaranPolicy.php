<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\RawPembayaran;
use App\Models\User;

class RawPembayaranPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any RawPembayaran');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, RawPembayaran $rawpembayaran): bool
    {
        return $user->can('view RawPembayaran');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create RawPembayaran');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, RawPembayaran $rawpembayaran): bool
    {
        return $user->can('update RawPembayaran');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, RawPembayaran $rawpembayaran): bool
    {
        return $user->can('delete RawPembayaran');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, RawPembayaran $rawpembayaran): bool
    {
        return $user->can('restore RawPembayaran');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, RawPembayaran $rawpembayaran): bool
    {
        return $user->can('force-delete RawPembayaran');
    }
}
