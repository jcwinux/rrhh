<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Role;
use App\ModulesRolesForm;
use App\ModulesRolesFormsFunctions;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	$roles = Role::where('estado','ACTIVO')->get();
		$str_random = array (rand(0,30000),rand(0,30000),rand(0,30000));
		return view('pages.configuracion.form_permisos',compact('str_random','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	public function modulos_asignados($role_id)
	{	$modules = DB::table('modules_roles')->join('modules','modules_roles.module_id','=','modules.id')
											 ->where('modules_roles.role_id',$role_id)
											 ->where('modules_roles.estado','ACTIVO')
											 ->select('modules.id','modules.nombre')
											 ->get();
		return response()->json($modules);
	}
	
	public function modules_roles_forms_functions_show($id)
	{	$funciones = DB::table('modules_roles_forms_functions')->join('form_functions','modules_roles_forms_functions.form_function_id','=','form_functions.id')
											 ->where('modules_roles_forms_functions.module_role_form_id',$id)
											 ->select('modules_roles_forms_functions.id','modules_roles_forms_functions.estado','form_functions.nombre')
											 ->get();
		return response()->json($funciones);
	}
	
	public function modules_roles_forms_functions_change_state($id,$estado,$formulario)
	{	$obj_permiso = ModulesRolesFormsFunctions::find($id);
		if ($estado=="true")
			$obj_permiso->estado='ACTIVO';
		else
			$obj_permiso->estado='INACTIVO';
		$obj_permiso->save();
		
		$obj_form = ModulesRolesForm::find($formulario);
		$count_funct = ModulesRolesFormsFunctions::where('module_role_form_id',$formulario)->where('estado','ACTIVO')->count();
		if ($count_funct>0)
			$obj_form->estado= 'ACTIVO';
		else
			$obj_form->estado= 'INACTIVO';
		$obj_form->save();
		
		return response()->json(array("result"=>"success","object"=>$obj_permiso->id));
	}
}
