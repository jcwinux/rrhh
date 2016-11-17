<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Permissions extends Model
{
	public function allowedRoute($form_id)
	{	$perm = DB::table('modules_roles_forms')->join('modules_roles','modules_roles_forms.module_role_id','modules_roles.id')
												->where('modules_roles_forms.estado','ACTIVO')
												->where('modules_roles.role_id',Auth::user()->role_id)
												->where('modules_roles_forms.form_id',$form_id)
												->count();
		if ($perm>0)
			return true;
		else
			return false;
	}
}
