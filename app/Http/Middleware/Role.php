<?php   

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{
    public function handle(Request $request, Closure $next, $role = 'administrador')
    {
        //Evaluar si el usuario esta identificado
        if(!auth()->check()) abort(403);
        $roles = explode('-', $role);
        if($request->user()->has_any_role($roles)){
            return $next($request);
        }else{
            abort(403);
        }        
    }
}
