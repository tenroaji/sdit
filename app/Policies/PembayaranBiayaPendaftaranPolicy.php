<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PembayaranBiayaPendaftaran;
use App\Models\User;

class PembayaranBiayaPendaftaranPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any PembayaranBiayaPendaftaran');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PembayaranBiayaPendaftaran $pembayaranbiayapendaftaran): bool
    {
        return $user->can('view PembayaranBiayaPendaftaran');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create PembayaranBiayaPendaftaran');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PembayaranBiayaPendaftaran $pembayaranbiayapendaftaran): bool
    {
        return $user->can('update PembayaranBiayaPendaftaran');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PembayaranBiayaPendaftaran $pembayaranbiayapendaftaran): bool
    {
        return $user->can('delete PembayaranBiayaPendaftaran');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PembayaranBiayaPendaftaran $pembayaranbiayapendaftaran): bool
    {
        return $user->can('restore PembayaranBiayaPendaftaran');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PembayaranBiayaPendaftaran $pembayaranbiayapendaftaran): bool
    {
        return $user->can('force-delete PembayaranBiayaPendaftaran');
    }
}
