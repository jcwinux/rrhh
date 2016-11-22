<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	$departamentos = Department::where('estado','ACTIVO')->get();
		$str_random = array (rand(0,30000),rand(0,30000),rand(0,30000));
		return view('pages.configuracion.form_departamento',compact('str_random','departamentos'));
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
    {	$json_department = json_decode($request->data,true);
		if ($json_department["departamento_id"]=="")
		{	$oDepartment = new Department();
		}
		else
			$oDepartment = Department::find($json_department["departamento_id"]);
		
		$oDepartment->nombre		= $json_department["nombre_departamento"];
		$oDepartment->descripcion	= $json_department["descripcion_departamento"];
		$oDepartment->save();
		
		return response()->json(array("result"=>"success","msg"=>"Todo OK","departamento_id"=>$oDepartment->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {	$oDepartment = Department::find($id);
		return response()->json($oDepartment);
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
	
	public function view()
	{	$departamentos = Department::all();
		$html = view('pages.configuracion.tabla_departamento', compact('view','departamentos'))->render();
        return response()->json(compact('html'));
	}
	public function change_state(Request $request)
	{	$oDepartment = Department::find($request->departamento_id);
		if($request->accion=="ACTIVAR")
			$oDepartment->estado="ACTIVO";
		if($request->accion=="INACTIVAR")
			$oDepartment->estado="INACTIVO";
		$oDepartment->save();
		return response()->json(array("result"=>"success","msg"=>"Todo OK","departamento_id"=>$oDepartment->id));
	}
}
