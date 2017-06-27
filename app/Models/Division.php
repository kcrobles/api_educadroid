<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  Division
 */
class Division extends Model
{
	protected $table = 'divisiones';

	public function cursos()
	{
		return $this->hasMany('App\Models\Curso');
	}

}
