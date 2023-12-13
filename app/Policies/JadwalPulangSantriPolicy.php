<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\JadwalPulangSantri;
use App\Models\User;

class JadwalPulangSantriPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any JadwalPulangSantri');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JadwalPulangSantri $jadwalpulangsantri): bool
    {
        return $user->can('view JadwalPulangSantri');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create JadwalPulangSantri');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JadwalPulangSantri $jadwalpulangsantri): bool
    {
        return $user->can('update JadwalPulangSantri');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JadwalPulangSantri $jadwalpulangsantri): bool
    {
        return $user->can('delete JadwalPulangSantri');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JadwalPulangSantri $jadwalpulangsantri): bool
    {
        return $user->can('restore JadwalPulangSantri');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JadwalPulangSantri $jadwalpulangsantri): bool
    {
        return $user->can('force-delete JadwalPulangSantri');
    }
}
