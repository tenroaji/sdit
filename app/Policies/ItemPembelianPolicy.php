<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\ItemPembelian;
use App\Models\User;

class ItemPembelianPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any ItemPembelian');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ItemPembelian $itempembelian): bool
    {
        return $user->can('view ItemPembelian');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create ItemPembelian');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ItemPembelian $itempembelian): bool
    {
        return $user->can('update ItemPembelian');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ItemPembelian $itempembelian): bool
    {
        return $user->can('delete ItemPembelian');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ItemPembelian $itempembelian): bool
    {
        return $user->can('restore ItemPembelian');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ItemPembelian $itempembelian): bool
    {
        return $user->can('force-delete ItemPembelian');
    }
}
