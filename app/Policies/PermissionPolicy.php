<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy {

    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\User $user
     * @param \App\Permission $permission
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->permissions()->contains('view-permissions');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->permissions()->contains('create-permissions');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\User $user
     * @param \App\Permission $permission
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->permissions()->contains('update-permissions');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\User $user
     * @param \App\Permission $permission
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->permissions()->contains('delete-permissions');
    }

}
