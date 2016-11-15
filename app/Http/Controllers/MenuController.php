<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function showMenu($rol_id)
	{	DB::table('modules_roles')->join('modules_roles_forms','modules_roles.id','modules_roles_forms.module_role_id')
								  ->join('forms','forms.id','modules_roles_forms.form_id')
								  ->where('modules_roles.role_id',$rol_id)
								  ->where('forms.estado','ACTIVO')
								  ->where('modules_roles_forms.estado','ACTIVO');
		
	}
}
