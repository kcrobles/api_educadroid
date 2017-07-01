<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  Materia
 */
class Materia extends Model
{
	protected $table = 'materias';
	public $timestamps = false;

	public function cursos()
	{
		return $this->hasMany('App\Models\Curso');
	}

}
