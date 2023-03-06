<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'dob',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'dob'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     // RELACIONES
        //un usuario puede tener muchos permisos
        public function permissions()
        {
            return $this->belongsToMany('App\Models\Permission');
        }
        //un usuario puede tener muchos roles
        public function roles()
        {
            return $this->belongsToMany('App\Models\Role')->withTimestamps();
        }
    // ALMACENAMIENTO
    public function store($request)
    {
        $user = self::create($request->all());
        $user->update(['password' =>Hash::make($request->password)]);
        $roles = [$request->role];
        $user->role_assignment(null, $roles);
        toast('Usuario creado con éxito','success','top-right');
        return $user;
    }

    public function my_update($request)
    {
         self::update($request->all());
         toast('Usuario actualizado','success','top-right');
    }

    public function role_assignment($request, array $roles = null){
        $roles = (is_null($roles)) ? $request->roles : $roles;
        $this->permission_mass_assignment($roles);
        $this->roles()->sync($roles);
        $this->verify_permission_integrity($roles);
        toast('Roles asignados','success','top-right');
    }
    // VALIDACIÓN
    public function is_admin(){
        $admin = config('app.admin_role');
        if ($this->has_role($admin)) {
            return true;
        }else{
            return false;
        }
    }
    public function has_role($id){
        foreach ($this->roles as $role) {
            if ($role->id == $id || $role->slug == $id) return true;

        }
        return false;
    }

    public function has_permission($id){
        foreach ($this->permissions as $permission) {
            if ($permission->id == $id || $permission->slug == $id) return true;

        }
        return false;
    }
    // RECUPERACIÓN DE INFORMACIÓN
    public function age()
    {
        if(!is_null($this->dob))
        {
            $age = $this->dob->age;
            $years = ($age == 1) ? 'año' : 'años';
            $msj = $age . ' ' . $years;
        }else{
            $msj = 'indefinido';
        }
        return $msj;
    }
    // OTRAS OPERACIONES 
    public function verify_permission_integrity(array $roles){
        $permissions = $this->permissions;
        foreach($permissions as $permission){
            if(!in_array($permission->role->id, $roles)){
                $this->permissions()->detach($permission->id);
            }
        }
    }

    public function permission_mass_assignment(array $roles){
        foreach ($roles as $role) {
            if (!$this->has_role($role)) {
                $role_obj = \App\Models\Role::findOrFail($role);
                $permissions = $role_obj->permissions;
                $this->permissions()->syncWithoutDetaching($permissions);
            }
        }
    }
}
