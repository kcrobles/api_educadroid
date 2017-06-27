<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  Respuestas a las preguntas
 */
class Respuesta extends Model
{
	protected $table = 'respuestas';

	public function pregunta()
    {
    	return $this->belongsTo('App\Models\Pregunta');
    }

		public function opcion()
	    {
	    	return $this->belongsTo('App\Models\Opcion');
	    }
}
