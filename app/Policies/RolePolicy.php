<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {
        return $user->has_permission('index-role');
    }

    public function view(User $user, Role $role)
    {
        return $user->has_permission('view-role');
    }
    public function create(User $user)
    {
        return $user->has_permission('create-role');
    }

    public function update(User $user, Role $role)
    {
        return $user->has_permission('update-role');
    }
    public function delete(User $user, Role $role)
    {
        return $user->has_permission('delete-role');
    }

    public function restore(User $user, Role $role)
    {
        //
    }

    public function forceDelete(User $user, Role $role)
    {
        //
    }
}
