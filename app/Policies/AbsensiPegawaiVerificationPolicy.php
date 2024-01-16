<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\AbsensiPegawaiVerification;
use App\Models\User;

class AbsensiPegawaiVerificationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any AbsensiPegawaiVerification');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AbsensiPegawaiVerification $AbsensiPegawaiVerification): bool
    {
        return $user->can('view AbsensiPegawaiVerification');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create AbsensiPegawaiVerification');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, AbsensiPegawaiVerification $AbsensiPegawaiVerification): bool
    {
        return $user->can('update AbsensiPegawaiVerification');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, AbsensiPegawaiVerification $AbsensiPegawaiVerification): bool
    {
        return $user->can('delete AbsensiPegawaiVerification');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, AbsensiPegawaiVerification $AbsensiPegawaiVerification): bool
    {
        return $user->can('restore AbsensiPegawaiVerification');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, AbsensiPegawaiVerification $AbsensiPegawaiVerification): bool
    {
        return $user->can('force-delete AbsensiPegawaiVerification');
    }
}
