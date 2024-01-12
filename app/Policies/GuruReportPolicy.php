<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\GuruReport;
use App\Models\User;

class GuruReportPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any GuruReport');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, GuruReport $guruReport): bool
    {
        return $user->can('view GuruReport');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create GuruReport');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, GuruReport $guruReport): bool
    {
        return $user->can('update GuruReport');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, GuruReport $guruReport): bool
    {
        return $user->can('delete GuruReport');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, GuruReport $guruReport): bool
    {
        return $user->can('restore GuruReport');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, GuruReport $guruReport): bool
    {
        return $user->can('force-delete GuruReport');
    }
}
