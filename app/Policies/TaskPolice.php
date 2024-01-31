<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TaskPolice
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user->email === 'admin@gmail.com';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Task $task)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function isManager(User $user)
    {
        return $user->email === 'manager@gmail.com';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user)
    {
        // return $user->viewAny() || $user->isManager();  
        return $this->isManager($user) || $this->viewAny($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function Users(User $user)
    {
        return $user->email === 'user@gmail.com';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function useradmin(User $user)
    {
        return $this->Users($user) || $this->viewAny($user);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Task $task)
    {
        //
    }
}
