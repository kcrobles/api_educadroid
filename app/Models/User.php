<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  Users
 */
class User extends Model
{
    protected $hidden = ['password'];

    public function rol()
    {
    	return $this->belongsTo('App\Models\Rol');
    }

    public function domicilio()
    {
    	return $this->belongsTo('App\Models\Domicilio');
    }

    public function resultados(){
      return $this->hasMany('App\Models\Resultado');
    }

    public function legajo()
    {
        return $this->hasOne('App\Models\Legajo');
    }

    public function cursos()
    {
      return $this->belongsToMany('App\Models\Curso' ,'curso_profesor', 'user_id', 'curso_id');
    }

    public function respuestas(){
		return $this->hasMany('App\Models\Respuesta');
	}

    public function scopeActive($query)
    {
        return $query->where('active', '=', '1');
    }

    public function scopeAlumnos($query)
    {
        return $query->where('rol_id', '=', '3');
    }

    public function scopeProfesores($query)
    {
        return $query->where('rol_id', '=', '2');
    }

    public function scopeAdministrativos($query)
    {
        return $query->where('rol_id', '=', '4');
    }

    public function scopeAdministradores($query)
    {
        return $query->where('rol_id', '=', '1');
    }
}
