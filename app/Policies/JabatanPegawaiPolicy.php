<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\JabatanPegawai;
use App\Models\User;

class JabatanPegawaiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any JabatanPegawai');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JabatanPegawai $jabatanpegawai): bool
    {
        return $user->can('view JabatanPegawai');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create JabatanPegawai');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JabatanPegawai $jabatanpegawai): bool
    {
        return $user->can('update JabatanPegawai');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JabatanPegawai $jabatanpegawai): bool
    {
        return $user->can('delete JabatanPegawai');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JabatanPegawai $jabatanpegawai): bool
    {
        return $user->can('restore JabatanPegawai');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JabatanPegawai $jabatanpegawai): bool
    {
        return $user->can('force-delete JabatanPegawai');
    }
}
