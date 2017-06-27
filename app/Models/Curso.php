<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  Curso
 */
class Curso extends Model
{
	protected $table = 'cursos';

	public function materia()
	{
		return $this->belongsTo('App\Models\Materia');
	}

  public function division()
  {
  	return $this->belongsTo('App\Models\Division');
  }

  public function legajos()
  {
    return $this->belongsToMany('App\Models\Legajo' ,'inscripciones', 'curso_id', 'legajo');
  }

  public function encuestas()
  {
    return $this->belongsToMany('App\Models\Encuestas' ,'cursos_encuestas', 'curso_id', 'encuesta_id');
  }
}
