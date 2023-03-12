<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class Role extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    // RELACIONES
        // un rol tiene muchos permisos
        public function permissions()
        {
        return $this->hasMany('App\Models\Permission');
        }
        //un rol tiene muchos usuarios 
        public function users()
        {
            return $this->belongsToMany('App\Models\User')->withTimestamp();
        }
    // ALMACENAMIENTO
        public function store($request)
        {
            $slug = Str::slug($request->name, '-');
            toast('Rol guardado','success','top-right');
            return self::create($request->all() + [
                'slug' => $slug,
            ]);            
        }

        public function my_update($request)
        {
            $slug = Str::slug($request->name, '-');
            self::update($request->all() +[
                'slug' => $slug,
            ]);
            toast('Rol actualizado','success','top-right');           
        }
    // VALIDACIÓN
    // RECUPERACIÓN DE INFORMACIÓN
    // OTRAS OPERACIONES 
    
}
