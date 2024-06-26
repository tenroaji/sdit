<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Fasilitas;
use App\Models\User;

class FasilitasPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Fasilitas');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Fasilitas $fasilitas): bool
    {
        return $user->can('view Fasilitas');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Fasilitas');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Fasilitas $fasilitas): bool
    {
        return $user->can('update Fasilitas');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Fasilitas $fasilitas): bool
    {
        return $user->can('delete Fasilitas');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Fasilitas $fasilitas): bool
    {
        return $user->can('restore Fasilitas');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Fasilitas $fasilitas): bool
    {
        return $user->can('force-delete Fasilitas');
    }
}
