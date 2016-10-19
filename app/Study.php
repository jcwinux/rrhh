<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    public function people()
	{	return $this->belongsTo('App\Person');
	}
}
