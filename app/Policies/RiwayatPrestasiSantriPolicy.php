<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\RiwayatPrestasiSantri;
use App\Models\User;

class RiwayatPrestasiSantriPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any RiwayatPrestasiSantri');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, RiwayatPrestasiSantri $riwayatprestasisantri): bool
    {
        return $user->can('view RiwayatPrestasiSantri');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create RiwayatPrestasiSantri');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, RiwayatPrestasiSantri $riwayatprestasisantri): bool
    {
        return $user->can('update RiwayatPrestasiSantri');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, RiwayatPrestasiSantri $riwayatprestasisantri): bool
    {
        return $user->can('delete RiwayatPrestasiSantri');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, RiwayatPrestasiSantri $riwayatprestasisantri): bool
    {
        return $user->can('restore RiwayatPrestasiSantri');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, RiwayatPrestasiSantri $riwayatprestasisantri): bool
    {
        return $user->can('force-delete RiwayatPrestasiSantri');
    }
}
