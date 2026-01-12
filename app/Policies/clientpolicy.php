<?php

namespace App\Policies;

use App\Models\User;
use App\Models\client;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class clientpolicy
{
    /**
     * Determine whether the user can view any models.
     */

     use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->hasRole('finance') || $user->hasRole('contable')) {
            return true; // super-admin bypass
        }
    }
    public function viewAny(User $user): bool
    {
        return $user->role === 'finance' || $user->role=='contable';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, client $client): bool
    {
         return $user->role === 'finance' || $user->role=='contable';
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
         return $user->role === 'finance' || $user->role=='contable';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, client $client): bool
    { 
        return $user->role === 'finance' || $user->role=='contable';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, client $client): bool
    { 
        return $user->role=='contable';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, client $client): bool
    {
         return $user->role=='contable';
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, client $client): bool
    {
       
         return $user->role=='contable';
    }
}
