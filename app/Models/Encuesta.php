<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  Encuestas
 */
class Encuesta extends Model
{
	protected $table = 'encuestas';
    public function preguntas()
    {
    	return $this->hasMany('App\Models\Pregunta', 'encuesta_id');
    }

		public function user(){
			return $this->belongsTo('App\Models\User');
		}

		public function cursos()
    {
      return $this->belongsToMany('App\Models\Cursos' ,'cursos_encuestas', 'encuesta_id', 'curso_id');
    }
}
