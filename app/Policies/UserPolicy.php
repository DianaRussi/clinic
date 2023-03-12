<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {
        return $user->has_permission('index-user');
    }
    
    public function view(User $user, User $model)
    {
        return $user->has_permission('view-user');
    }

    public function create(User $user)
    {
        return $user->has_permission('create-user');
    }

    public function update(User $user, User $model)
    {
        return ($user->has_permission('update-user') &&
                $user->has_role(config('app.admin_role')))  ||
                $user->id == $model->id;
    }

    public function delete(User $user, User $model)
    {
        return $user->has_permission('delete-user');
    }

    public function restore(User $user, User $model)
    {
        //
    }

    public function forceDelete(User $user, User $model)
    {
        //
    }
    public function assign_role(User $user)
    {
        return $user->has_permission('assign-role-user');
    }

    public function assign_permission(User $user)
    {
        return $user->has_permission('assign-permission-user');
    }

    public function import(User $user)
    {
        return $user->has_permission('import-user');
    }
    public function update_password(User $user, User $model)
    {
        return $user->id == $model->id;
    }
}
