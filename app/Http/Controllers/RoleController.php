<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Module;
use App\Role;
use App\ModulesRole;
use Response;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	$modulos = Module::where('estado','ACTIVO')->get();
		$roles = Role::all();
		$str_random = array (rand(0,30000),rand(0,30000),rand(0,30000));
		return view('pages.configuracion.form_rol',compact('str_random','modulos','roles'));
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
    {	DB::beginTransaction();
		/*Guardo JSON*/
		$json_rol = json_decode($request->data,true);
		if ($json_rol["rol_id"]=="")
			$oRol = new Role ();
		else
			$oRol = Role::find($json_rol["rol_id"]);
		
		$oRol->nombre = $json_rol["nombre"];
		$oRol->descripcion = $json_rol["descripcion"];
		$oRol->save();
		if (!$oRol)
			DB::rollBack();
		
		/*Agrego los módulos*/
		foreach ($json_rol["modulos"] as $modulo)
		{	if ($json_rol["rol_id"]=="")
				$oModuleRole = new ModulesRole();
			else
				$oModuleRole = ModulesRole::where('module_id',$modulo["modulo_id"])->where('role_id',$oRol->id)->first();
			$oModuleRole->module_id = $modulo["modulo_id"];
			$oModuleRole->role_id = $oRol->id;
			$oModuleRole->estado = ($modulo["habilitado"]?"ACTIVO":"INACTIVO");
			$oModuleRole->save();
			if (!$oModuleRole)
				DB::rollBack();
		}
		DB::commit();
		print json_encode(array("result"=>"success","msg"=>"Todo OK","rol_id"=>$oRol->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($role_id)
    {	$oRole = Role::find($role_id);
		$oModulo = DB::table('modules_roles')
						->join('modules','modules.id','=','modules_roles.module_id')
						->where('modules_roles.role_id',$role_id)
						->select('modules.id','modules.nombre','modules.descripcion','modules.created_at','modules_roles.estado')
						->get();
		
		//print json_encode($oRole);
		//Response::json(array('rol'=>$oRole,'modulos'=>$oModulo));
		print json_encode(array('rol'=>$oRole,'modulos'=>$oModulo));
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
	
	public function change_state(Request $request)
    {	$oRole = Role::find($request->rol_id);
		if($request->accion=="ACTIVAR")
			$oRole->estado="ACTIVO";
		if($request->accion=="INACTIVAR")
			$oRole->estado="INACTIVO";
		$oRole->save();
		print json_encode(array("result"=>"success","msg"=>"Todo OK","rol_id"=>$oRole->id));
    }
}
