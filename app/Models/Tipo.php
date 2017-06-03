<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  Tipos de formato de preguntas: checkbox, radiobutton, select, multiselect
 */
class Tipo extends Model
{
	protected $table = 'tipos';

	public function preguntas()
    {
    	return $this->hasMany('App\Models\Pregunta');
    }
}
