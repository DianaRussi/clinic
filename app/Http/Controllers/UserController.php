<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
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
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        return view('theme.backoffice.pages.user.show',[
            'user' => $user,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
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
