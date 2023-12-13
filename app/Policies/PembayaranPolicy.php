<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Pembayaran;
use App\Models\User;

class PembayaranPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Pembayaran');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Pembayaran $pembayaran): bool
    {
        return $user->can('view Pembayaran');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Pembayaran');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Pembayaran $pembayaran): bool
    {
        return $user->can('update Pembayaran');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Pembayaran $pembayaran): bool
    {
        return $user->can('delete Pembayaran');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Pembayaran $pembayaran): bool
    {
        return $user->can('restore Pembayaran');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Pembayaran $pembayaran): bool
    {
        return $user->can('force-delete Pembayaran');
    }
}
