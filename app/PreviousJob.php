<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreviousJob extends Model
{
    public function people()
	{	return $this->belongsTo('App\Person');
	}
}
