<?php

namespace App\Policies;

use App\Models\User;
use App\Models\stockmodel;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class stockpolicy
{

    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->hasRole('finance') || $user->hasRole('contable')) {
            return true; // super-admin bypass
        }
    /**
     * Determine whether the user can view any models.
     */}
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
         return $user->role=='finance' || $user->role=='contable';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, stockmodel $stockmodel): bool
    {
       return $user->role=='finance' || $user->role=='contable';
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role=='finance' || $user->role=='contable';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, stockmodel $stockmodel): bool
    {
        return $user->role=='finance' || $user->role=='contable';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, stockmodel $stockmodel): bool
    {
      return $user->role=='finance' || $user->role=='contable';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, stockmodel $stockmodel): bool
    {
         return $user->role=='finance' || $user->role=='contable';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, stockmodel $stockmodel): bool
    {
        return $user->role=='finance' || $user->role=='contable';
    }
}
