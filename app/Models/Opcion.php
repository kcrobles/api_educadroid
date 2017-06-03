<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  Opciones para las preguntas
 */
class Opcion extends Model
{
	protected $table = 'opciones';

	public function pregunta()
    {
    	return $this->belongsTo('App\Models\Pregunta');
    }
}
