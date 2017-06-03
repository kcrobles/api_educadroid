<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  Roles
 */
class Rol extends Model
{
	protected $table = 'roles';
	public $timestamps = false;
    public function users()
    {
    	return $this->hasMany('App\Models\User');
    }
}
