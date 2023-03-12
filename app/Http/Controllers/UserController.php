<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
class UserController extends Controller
{
    public function __construct()
    {
	    $this->middleware('auth');
    }
    public function index()
    {
        $this->authorize('index', User::class);
        return view('theme.backoffice.pages.user.index',[
            'users' => User::all(),
        ]);
    }

    public function create()
    {
        $this->authorize('create', User::class);
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
        $this->authorize('view', $user);
        return view('theme.backoffice.pages.user.show',[
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
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
        $this->authorize('delete', $user);
        $user->delete();
        toast('Usuario eliminado','success','top-right');
        return redirect()->route('backoffice.user.index');
    }
    // mostrar formulario para asignar rol
    public function assign_role(User $user)
    {
        $this->authorize('assign_role', $user);
        return view('theme.backoffice.pages.user.assign_role',[
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }
    // asignar los roles en la tabla pivote de la bd
    public function role_assignment(Request $request, User $user)
    {
        $this->authorize('assign_role', $user);
        $user->role_assignment($request);
        return redirect()->route('backoffice.user.show', $user);
    }
    // mostrar los formularios para asignar los permisos
    public function assign_permission(User $user)
    {
        $this->authorize('assign_permission', $user);
        return view('theme.backoffice.pages.user.assign_permission',[
            'user' => $user,
            'roles' => $user->roles,
        ]);
    }
    // asignar permisos en la tabla pivote de la bd
    public function permission_assignment(Request $request, User $user)
    {
        $this->authorize('assign_permission', $user);
        $user->permissions()->sync($request->permissions);
        toast('Permisos asignados','success','top-right');
        return redirect()->route('backoffice.user.show', $user);
    }

    //mostrar formulario para importar usuarios
    public function import() 
    {
        $this->authorize('import', User::class);
        return view('theme.backoffice.pages.user.import');
    }

    // importar usuario desde una tabla de excel
    public function make_import(Request $request)
    {
        $this->authorize('import', User::class);
        Excel::import(new UsersImport, $request->file('excel'));
        toast('Usuarios importados','success','top-right');
        return redirect()->route('backoffice.user.index');
    }

    //mostrar perfil de usuario
    public function profile()
    {
        $user = auth()->user();
        return view('theme.frontoffice.pages.user.profile',[
            'user' => $user,
        ]);
    }
}
