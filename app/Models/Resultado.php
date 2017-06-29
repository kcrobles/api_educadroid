<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  Resultado
 */
class Resultado extends Model
{
	protected $table = 'resultados';
	public $timestamps = false;

	public function pregunta()
	{
		return $this->belongsTo('App\Models\Pregunta');
	}

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

}
