<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Http\Requests\Permission\StoreRequest;
use App\Http\Requests\Permission\UpdateRequest;
use App\Models\Role;

class PermissionController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:' . config('app.admin_permission'));
    }

    public function index()
    {
        $this->authorize('index',Permission::class);
        return view('theme.backoffice.pages.permission.index', [
            'permissions' => Permission::all()
        ]);
    }

    public function create()
    {
        $this->authorize('create',Permission::class);
        return view ('theme.backoffice.pages.permission.create',[
            'roles' => Role::all(),
        ]);
    }

    public function store(StoreRequest $request, Permission $permission)
    {
        $permission = $permission->store($request);
        return redirect()->route('backoffice.permission.show', $permission);
    } 

    public function show(Permission $permission)
    {
        $this->authorize('view', $permission);
        return view('theme.backoffice.pages.permission.show', [
            'permission' => $permission
        ]);
    }

    public function edit(Permission $permission)
    {
        $this->authorize('update', $permission);
        return view('theme.backoffice.pages.permission.edit',[
            'permission' => $permission,
            'roles' => Role::all(),
        ]);
    }

    public function update(UpdateRequest $request, Permission $permission)
    {
        $permission->my_update($request);
        return redirect()->route('backoffice.permission.show', $permission);
    }

    public function destroy(Permission $permission)
    {
        $this->authorize('delete', $permission);
        $role = $permission->role;
        $permission->delete();
        toast('Permiso eliminado','success','top-right');
        return redirect()->route('backoffice.role.show', $role);
    }
}
