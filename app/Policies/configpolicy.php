<?php

namespace App\Policies;

use App\Models\User;
use App\Models\config;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class configpolicy
{
       use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->hasRole('super-admin')) {
            return true; // super-admin bypass
        }
    /**
     * Determine whether the user can view any models.
     */}
    public function viewAny(User $user): bool
    {
        return $user->role=='super-admin';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, config $config): bool
    {
         return $user->role=='super-admin';
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
         return $user->role=='super-admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, config $config): bool
    { 
        return $user->role=='super-admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, config $config): bool
    {
         return $user->role=='super-admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, config $config): bool
    {
         return $user->role=='super-admin';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, config $config): bool
    {
         return $user->role=='super-admin';
    }
}
