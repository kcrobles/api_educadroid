<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  CursoEncuesta
 */
class CursoEncuesta extends Model
{
	protected $table = 'cursos_encuestas';
	public $timestamps = false;
	protected $primaryKey = [
        'curso_id',
        'encuesta_id'
    ];

	public function curso()
	{
		return $this->belongsTo('App\Models\Curso');
	}

  public function encuesta()
  {
  	return $this->belongsTo('App\Models\Encuesta');
  }

}
