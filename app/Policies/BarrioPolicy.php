<?php

namespace App\Policies;

use App\Models\User;

class BarrioPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function update(User $user){
        return $user->role === 'admin';
    }

    public function delete(User $user){
        
    }
}
