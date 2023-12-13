<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\RosterMataPelajaran;
use App\Models\User;

class RosterMataPelajaranPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any RosterMataPelajaran');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, RosterMataPelajaran $rostermatapelajaran): bool
    {
        return $user->can('view RosterMataPelajaran');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create RosterMataPelajaran');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, RosterMataPelajaran $rostermatapelajaran): bool
    {
        return $user->can('update RosterMataPelajaran');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, RosterMataPelajaran $rostermatapelajaran): bool
    {
        return $user->can('delete RosterMataPelajaran');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, RosterMataPelajaran $rostermatapelajaran): bool
    {
        return $user->can('restore RosterMataPelajaran');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, RosterMataPelajaran $rostermatapelajaran): bool
    {
        return $user->can('force-delete RosterMataPelajaran');
    }
}
