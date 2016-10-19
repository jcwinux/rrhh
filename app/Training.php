<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Training extends Model
{
    //use SoftDeletes;
	//protected $dates = ['deleted_at'];
	//protected $softDelete = true;
	public function people()
	{	return $this->hasMany('App\Person');
	}
}
