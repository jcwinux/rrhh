<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function people()
	{	return $this->belongsTo('App\Person');
	}
}
