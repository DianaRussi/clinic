<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    // VALIDACIÓN
    // RECUPERACIÓN DE INFORMACIÓN
    // OTRAS OPERACIONES 
}
