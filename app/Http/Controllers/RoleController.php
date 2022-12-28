<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\Role\StoreRequest;
use App\Http\Requests\Role\UpdateRequest;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        //pendientes añadir autorizaciones
        return view ('theme.backoffice.pages.role.index', [
            'roles' => Role::all(),
        ]);
    }

    public function create()
    {
        return view('theme.backoffice.pages.role.create');
    }

    public function store(StoreRequest $request, Role $role)
    {
        $role = $role->store($request);
        return redirect()->route('backoffice.role.show', $role);
    }

    public function show(Role $role)
    {
        return view('theme.backoffice.pages.role.show', [
            'role' => $role,
            'permissions' => $role->permissions
        ]);
    }

    public function edit(Role $role)
    {
         //pendientes añadir autorizaciones
         return view('theme.backoffice.pages.role.edit', [
            'role' => $role,
        ]);
    }

    public function update(UpdateRequest $request, Role $role)
    {
        $role->my_update($request);
        return redirect()->route('backoffice.role.show', $role);
    }

    public function destroy(Role $role)
    {
        //pendientes añadir autorizaciones
        $role->delete();
        toast('Rol eliminado','success','top-right');
        return redirect()->route('backoffice.role.index');
    }
}
