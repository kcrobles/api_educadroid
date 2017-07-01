<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  legajo
 */
class Inscripcion extends Model
{
	protected $table = 'inscripciones';

	public function legajos()
	{
		return $this->hasOne('App\Models\Legajo');
	}

  public function cursos()
  {
   	return $this->hasMany('App\Models\Curso');
  }

  // public function users()
  // {
  //   return $this->hasManyThrough('App\Models\User', 'App\Models\Legajo');
  // }
}
