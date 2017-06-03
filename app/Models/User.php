<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  Users
 */
class User extends Model
{
    protected $hidden = ['password'];
    
    public function invoices()
    {
    	return $this->hasMany('App\Models\Invoice');
    }
    
    public function rol()
    {
    	return $this->belongsTo('App\Models\Rol');
    }

    public function domicilio()
    {
    	return $this->belongsTo('App\Models\Domicilio');
    }
}
