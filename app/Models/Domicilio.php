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
    	return $this->hasMany('App\Models\User');
    }
}
