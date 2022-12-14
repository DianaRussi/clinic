<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return 'Hola desde RoleController index';
    }

    public function create()
    {
        return view('theme.backoffice.pages.role.create');
    }

    public function store(Request $request)
    {
       dd($request);
    }

    public function show(Role $role)
    {
        //
    }

    public function edit(Role $role)
    {
        //
    }

    public function update(Request $request, Role $role)
    {
        //
    }

    public function destroy(Role $role)
    {
        //
    }
}
