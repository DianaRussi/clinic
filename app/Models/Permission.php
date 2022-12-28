<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class Permission extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'role_id'
    ];

     // RELACIONES
        // Un permiso tiene un rol
        public function role()
        {
        return $this->belongsTo('App\Models\Role');
        }
        //un permiso tiene muchos usuarios
        public function users()
        {
            return $this->belongsToMany('App\Models\User')->withTimestamp();
        }
    // ALMACENAMIENTO
    public function store($request){
        $slug = Str::slug($request->name, '-');
            toast('Permiso guardado','success','top-right');
            return self::create($request->all() + [
                'slug' => $slug,
            ]);     
    }

    public function my_update($request){
        $slug = Str::slug($request->name, '-');
            self::update($request->all() +[
                'slug' => $slug,
            ]);
            toast('Permiso actualizado','success','top-right'); 
    }
    // VALIDACIÓN
    // RECUPERACIÓN DE INFORMACIÓN
    // OTRAS OPERACIONES 
}
