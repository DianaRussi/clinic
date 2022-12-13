<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

     // RELACIONES
        // Un permiso tiene un rol
        public function role()
        {
        return $this->belogsTo('App\Models\Role');
        }
        //un permiso tiene muchos usuarios
        public function users()
        {
            return $this->belongsToMany('App\Models\User')->withTimestamp();
        }
    // ALMACENAMIENTO
    // VALIDACIÓN
    // RECUPERACIÓN DE INFORMACIÓN
    // OTRAS OPERACIONES 
}
