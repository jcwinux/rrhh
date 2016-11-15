<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;


class User extends Model implements AuthenticatableContract
{
    use Authenticatable;
	public function showMenu($module_id)
	{	$rows = DB::table('modules_roles')->join('modules_roles_forms','modules_roles.id','modules_roles_forms.module_role_id')
								  ->join('forms','forms.id','modules_roles_forms.form_id')
								  ->where('modules_roles.role_id',$this->role_id)
								  ->where('modules_roles.module_id',$module_id)
								  ->where('forms.estado','ACTIVO')
								  ->where('modules_roles_forms.estado','ACTIVO')
								  ->select('forms.nombre as nombre','forms.descripcion as descripcion','forms.icono as icono','forms.ruta as ruta')
								  ->get();
		return $rows;
	}
}
