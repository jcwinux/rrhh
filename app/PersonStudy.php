<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonStudy extends Model
{	protected $fillable = ['person_id','catalog_id_nivel_estudio','institucion','created_at','updated_at'];
    public function person()
	{	return $this->belongsTo('App\Person');
	}
}