<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PengaturanAsrama;
use App\Models\User;

class PengaturanAsramaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any PengaturanAsrama');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PengaturanAsrama $pengaturanasrama): bool
    {
        return $user->can('view PengaturanAsrama');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create PengaturanAsrama');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PengaturanAsrama $pengaturanasrama): bool
    {
        return $user->can('update PengaturanAsrama');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PengaturanAsrama $pengaturanasrama): bool
    {
        return $user->can('delete PengaturanAsrama');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PengaturanAsrama $pengaturanasrama): bool
    {
        return $user->can('restore PengaturanAsrama');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PengaturanAsrama $pengaturanasrama): bool
    {
        return $user->can('force-delete PengaturanAsrama');
    }
}
