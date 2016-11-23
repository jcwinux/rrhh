<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	$ubicaciones = Location::where('estado','ACTIVO')->get();
		$str_random = array (rand(0,30000),rand(0,30000),rand(0,30000));
		return view('pages.configuracion.form_ubicacion',compact('str_random','ubicaciones'));
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
    {	$json_location = json_decode($request->data,true);
		if ($json_location["ubicacion_id"]=="")
		{	$oLocation = new Location();
		}
		else
			$oLocation = Location::find($json_location["ubicacion_id"]);
		
		$oLocation->nombre		= $json_location["nombre_ubicacion"];
		$oLocation->descripcion	= $json_location["descripcion_ubicacion"];
		$oLocation->save();
		
		return response()->json(array("result"=>"success","msg"=>"Todo OK","ubicacion_id"=>$oLocation->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {	$oLocation = Location::find($id);
		return response()->json($oLocation);
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
	{	$ubicaciones = Location::all();
		$html = view('pages.configuracion.tabla_ubicacion', compact('view','ubicaciones'))->render();
        return response()->json(compact('html'));
	}
	public function change_state(Request $request)
	{	$oLocation = Location::find($request->ubicacion_id);
		if($request->accion=="ACTIVAR")
			$oLocation->estado="ACTIVO";
		if($request->accion=="INACTIVAR")
			$oLocation->estado="INACTIVO";
		$oLocation->save();
		return response()->json(array("result"=>"success","msg"=>"Todo OK","ubicacion_id"=>$oLocation->id));
	}
}
