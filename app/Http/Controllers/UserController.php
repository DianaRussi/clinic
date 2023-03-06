<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
class UserController extends Controller
{
    public function index()
    {
        return view('theme.backoffice.pages.user.index',[
            'users' => User::all(),
        ]);
    }

    public function create()
    {
        return view('theme.backoffice.pages.user.create',[
            'roles' => Role::all(),
        ]);
    }

    public function store(StoreRequest $request, User $user)
    {
       $user = $user->store($request);
       return redirect()->route('backoffice.user.show', $user);
    }

    public function show(User $user)
    {
        return view('theme.backoffice.pages.user.show',[
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        return view('theme.backoffice.pages.user.edit',[
            'user' => $user,
        ]);
    }

    public function update(UpdateRequest $request, User $user)
    {
        $user->my_update($request);
        return redirect()->route('backoffice.user.show', $user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        toast('Usuario eliminado','success','top-right');
        return redirect()->route('backoffice.user.index');
    }

    public function assign_role(User $user)
    {
        return view('theme.backoffice.pages.user.assign_role',[
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }
    public function role_assignment(Request $request, User $user)
    {
        $user->role_assignment($request);
        return redirect()->route('backoffice.user.show', $user);
    }

    public function assign_permission(User $user)
    {
        return view('theme.backoffice.pages.user.assign_permission',[
            'user' => $user,
            'roles' => $user->roles,
        ]);
    }
    public function permission_assignment(Request $request, User $user)
    {
        $user->permissions()->sync($request->permissions);
        toast('Permisos asignados','success','top-right');
        return redirect()->route('backoffice.user.show', $user);
    }
}
