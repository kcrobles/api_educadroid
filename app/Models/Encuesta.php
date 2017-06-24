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
}
