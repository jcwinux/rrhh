<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Person extends Model implements AuthenticatableContract
{
	use Authenticatable;
	protected $fillable = ['document_type_id','num_identificacion','nombre_1','nombre_2','apellido_1','apellido_2','fecha_ncto','nacionalidad','trato','sexo','discapacidad','grupo_sanguineo','email_institucional','email_personal','telefono_convencional','telefono_celular','province_id','city_id','town_id','calle_principal','calle_transversal','manzana','villa','username','password','remember_token','estado','created_at','updated_at'];
	
	public function studies()
	{	return $this->hasMany('App\Study');
	}
	public function trainings()
	{	return $this->hasMany('App\Training');
	}
	public function languages()
	{	return $this->hasMany('App\Language');
	}
	public function previous_jobs()
	{	return $this->hasMany('App\PreviousJob');
	}
	public function document_types()
	{	return $this->belongsTo('App\DocumentType');
	}
	public function provinces()
	{	return $this->belongsTo('App\Province');
	}
	public function cities()
	{	return $this->belongsTo('App\City');
	}
	public function towns()
	{	return $this->belongsTo('App\Town');
	}
}
