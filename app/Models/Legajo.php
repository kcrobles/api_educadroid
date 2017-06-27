<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  legajo
 */
class Legajo extends Model
{
	protected $table = 'legajos';
  protected $primaryKey = 'legajo';
  public $timestamps = false;

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

    public function cursos()
    {
    	return $this->belongsToMany('App\Models\Curso' ,'inscripciones', 'legajo', 'curso_id');
    }

}
