<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  Roles
 */
class Domicilio extends Model
{
	protected $table = 'domicilios';
    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
