<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{

    
    public function manegeUser(User $user){
        return $user->is_admin;
        }
    
        public function manegePost(User $user){
            return $user->is_admin;
        }
    
        public function createUser(User $user){
            return $user->is_admin;
        }
    
        public function updateUser(User $user) {
        return $user->is_admin;
        }
    
        public function deleteUser(User $user) { 
            return $user->is_admin; 
        }
    /**
     * Determine whether the user can view any models.
     */
    /* public function viewAny(User $user): bool
    {
        //
    } */

    /**
     * Determine whether the user can view the model.
     */
    /* public function view(User $user, User $model): bool
    {
        //
    } */

    /**
     * Determine whether the user can create models.
     */
    /* public function create(User $user): bool
    {
        //
    } */

    /**
     * Determine whether the user can update the model.
     */
    /* public function update(User $user, User $model): bool
    {
        //
    } */

    /**
     * Determine whether the user can delete the model.
     */
    /* public function delete(User $user, User $model): bool
    {
        //
    } */

    /**
     * Determine whether the user can restore the model.
     */
    /* public function restore(User $user, User $model): bool
    {
        //
    } */

    /**
     * Determine whether the user can permanently delete the model.
     */
    /* public function forceDelete(User $user, User $model): bool
    {
        //
    } */
}
