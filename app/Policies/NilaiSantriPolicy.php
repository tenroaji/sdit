<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\NilaiSantri;
use App\Models\User;

class NilaiSantriPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any NilaiSantri');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, NilaiSantri $nilaisantri): bool
    {
        return $user->can('view NilaiSantri');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create NilaiSantri');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, NilaiSantri $nilaisantri): bool
    {
        return $user->can('update NilaiSantri');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, NilaiSantri $nilaisantri): bool
    {
        return $user->can('delete NilaiSantri');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, NilaiSantri $nilaisantri): bool
    {
        return $user->can('restore NilaiSantri');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, NilaiSantri $nilaisantri): bool
    {
        return $user->can('force-delete NilaiSantri');
    }
}
