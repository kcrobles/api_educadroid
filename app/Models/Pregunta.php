<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  Preguntas
 */
class Pregunta extends Model
{
	protected $table = 'preguntas';

	public function encuesta()
	{
		return $this->belongsTo('App\Models\Encuesta');
	}

    public function opciones()
    {
    	return $this->hasMany('App\Models\Opcion');
    }
}
