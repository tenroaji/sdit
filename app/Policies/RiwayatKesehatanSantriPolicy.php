<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\RiwayatKesehatanSantri;
use App\Models\User;

class RiwayatKesehatanSantriPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any RiwayatKesehatanSantri');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, RiwayatKesehatanSantri $riwayatkesehatansantri): bool
    {
        return $user->can('view RiwayatKesehatanSantri');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create RiwayatKesehatanSantri');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, RiwayatKesehatanSantri $riwayatkesehatansantri): bool
    {
        return $user->can('update RiwayatKesehatanSantri');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, RiwayatKesehatanSantri $riwayatkesehatansantri): bool
    {
        return $user->can('delete RiwayatKesehatanSantri');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, RiwayatKesehatanSantri $riwayatkesehatansantri): bool
    {
        return $user->can('restore RiwayatKesehatanSantri');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, RiwayatKesehatanSantri $riwayatkesehatansantri): bool
    {
        return $user->can('force-delete RiwayatKesehatanSantri');
    }
}
