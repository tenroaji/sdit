<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PenerimaanSantriBaru;
use App\Models\User;

class PenerimaanSantriBaruPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any PenerimaanSantriBaru');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PenerimaanSantriBaru $penerimaansantribaru): bool
    {
        return $user->can('view PenerimaanSantriBaru');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create PenerimaanSantriBaru');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PenerimaanSantriBaru $penerimaansantribaru): bool
    {
        return $user->can('update PenerimaanSantriBaru');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PenerimaanSantriBaru $penerimaansantribaru): bool
    {
        return $user->can('delete PenerimaanSantriBaru');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PenerimaanSantriBaru $penerimaansantribaru): bool
    {
        return $user->can('restore PenerimaanSantriBaru');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PenerimaanSantriBaru $penerimaansantribaru): bool
    {
        return $user->can('force-delete PenerimaanSantriBaru');
    }
}
