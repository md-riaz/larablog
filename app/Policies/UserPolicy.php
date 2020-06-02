<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy {

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
     * @param User $user
     * @param User $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        return $user->id === $model->id || $user->permissions()->contains('view-users');
    }


    /**
     * Determine whether the user can create models.
     *
     * @return bool
     */
    public function create()
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\User $user
     * @param \App\User $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        return $user->id === $model->id || $user->permissions()->contains('update-users');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\User $user
     * @param \App\User $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        return $user->id === $model->id || $user->permissions()->contains('delete-users');
    }


    /**
     * Determine whether the user can change role.
     * @param User $user
     * @return bool
     */
    public function changeRole(User $user)
    {
        return $user->isAdmin() || $user->isSuperAdmin();
    }
}
