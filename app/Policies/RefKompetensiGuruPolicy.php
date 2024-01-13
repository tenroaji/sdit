<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\RefKompetensiGuru;
use App\Models\User;

class RefKompetensiGuruPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any RefKompetensiGuru');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, RefKompetensiGuru $RefKompetensiGuru): bool
    {
        return $user->can('view RefKompetensiGuru');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create RefKompetensiGuru');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, RefKompetensiGuru $RefKompetensiGuru): bool
    {
        return $user->can('update RefKompetensiGuru');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, RefKompetensiGuru $RefKompetensiGuru): bool
    {
        return $user->can('delete RefKompetensiGuru');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, RefKompetensiGuru $RefKompetensiGuru): bool
    {
        return $user->can('restore RefKompetensiGuru');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, RefKompetensiGuru $RefKompetensiGuru): bool
    {
        return $user->can('force-delete RefKompetensiGuru');
    }
}
