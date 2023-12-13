<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\JenisKegiatan;
use App\Models\User;

class JenisKegiatanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any JenisKegiatan');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JenisKegiatan $jeniskegiatan): bool
    {
        return $user->can('view JenisKegiatan');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create JenisKegiatan');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JenisKegiatan $jeniskegiatan): bool
    {
        return $user->can('update JenisKegiatan');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JenisKegiatan $jeniskegiatan): bool
    {
        return $user->can('delete JenisKegiatan');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JenisKegiatan $jeniskegiatan): bool
    {
        return $user->can('restore JenisKegiatan');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JenisKegiatan $jeniskegiatan): bool
    {
        return $user->can('force-delete JenisKegiatan');
    }
}
