<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    public function people()
	{	return $this->hasMany('App\Person');
	}
}
