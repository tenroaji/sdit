<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\JenisNilai;
use App\Models\User;

class JenisNilaiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // return $user->hasRole(['Admin','Super Admin','Akademik']);
        return $user->can('view-any JenisNilai');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JenisNilai $jenisnilai): bool
    {
        return $user->can('view JenisNilai');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create JenisNilai');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JenisNilai $jenisnilai): bool
    {
        return $user->can('update JenisNilai');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JenisNilai $jenisnilai): bool
    {
        return $user->can('delete JenisNilai');
    }

    public function deleteAny(User $user): bool
    {
        return $user->can('delete-any JenisNilai');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JenisNilai $jenisnilai): bool
    {
        return $user->can('restore JenisNilai');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JenisNilai $jenisnilai): bool
    {
        return $user->can('force-delete JenisNilai');
    }

   
}
