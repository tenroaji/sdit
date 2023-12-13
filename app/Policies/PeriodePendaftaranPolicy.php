<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PeriodePendaftaran;
use App\Models\User;

class PeriodePendaftaranPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any PeriodePendaftaran');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PeriodePendaftaran $periodependaftaran): bool
    {
        return $user->can('view PeriodePendaftaran');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create PeriodePendaftaran');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PeriodePendaftaran $periodependaftaran): bool
    {
        return $user->can('update PeriodePendaftaran');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PeriodePendaftaran $periodependaftaran): bool
    {
        return $user->can('delete PeriodePendaftaran');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PeriodePendaftaran $periodependaftaran): bool
    {
        return $user->can('restore PeriodePendaftaran');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PeriodePendaftaran $periodependaftaran): bool
    {
        return $user->can('force-delete PeriodePendaftaran');
    }
}
