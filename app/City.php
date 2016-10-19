<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function people()
	{	return $this->hasMany('App\Person');
	}
}
