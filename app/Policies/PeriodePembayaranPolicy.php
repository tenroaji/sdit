<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PeriodePembayaran;
use App\Models\User;

class PeriodePembayaranPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any PeriodePembayaran');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PeriodePembayaran $periodepembayaran): bool
    {
        return $user->can('view PeriodePembayaran');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create PeriodePembayaran');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PeriodePembayaran $periodepembayaran): bool
    {
        return $user->can('update PeriodePembayaran');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PeriodePembayaran $periodepembayaran): bool
    {
        return $user->can('delete PeriodePembayaran');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PeriodePembayaran $periodepembayaran): bool
    {
        return $user->can('restore PeriodePembayaran');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PeriodePembayaran $periodepembayaran): bool
    {
        return $user->can('force-delete PeriodePembayaran');
    }
}
