<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PenyusunanKegiatan;
use App\Models\User;

class PenyusunanKegiatanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any PenyusunanKegiatan');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PenyusunanKegiatan $penyusunankegiatan): bool
    {
        return $user->can('view PenyusunanKegiatan');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create PenyusunanKegiatan');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PenyusunanKegiatan $penyusunankegiatan): bool
    {
        return $user->can('update PenyusunanKegiatan');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PenyusunanKegiatan $penyusunankegiatan): bool
    {
        return $user->can('delete PenyusunanKegiatan');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PenyusunanKegiatan $penyusunankegiatan): bool
    {
        return $user->can('restore PenyusunanKegiatan');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PenyusunanKegiatan $penyusunankegiatan): bool
    {
        return $user->can('force-delete PenyusunanKegiatan');
    }
}
