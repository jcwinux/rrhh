<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CostCenter;
class CostCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	$centros_costos = CostCenter::all();
		$str_random = array (rand(0,30000),rand(0,30000),rand(0,30000));
		return view('pages.personal.form_centro_costo',compact('centros_costos','str_random'));
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
    {	$json_cost_center = json_decode($request->data,true);
		if ($json_cost_center["centro_costo_id"]=="")
		{	$oCostCenter = new CostCenter();
		}
		else
			$oCostCenter = CostCenter::find($json_cost_center["centro_costo_id"]);
		
		$oCostCenter->nombre		= $json_cost_center["nombre_centro_costo"];
		$oCostCenter->descripcion	= $json_cost_center["descripcion_centro_costo"];
		$oCostCenter->cuenta_contable	= $json_cost_center["cuenta_contable_centro_costo"];
		$oCostCenter->save();
		
		return response()->json(array("result"=>"success","msg"=>"Todo OK","centro_costo_id"=>$oCostCenter->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 public function show($id)
    {	$oCostCenter = CostCenter::find($id);
		return response()->json($oCostCenter);
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
    {	$centros_costos = CostCenter::all();
		$html = view('pages.personal.tabla_centro_costo', compact('view','centros_costos'))->render();
        return response()->json(compact('html'));
    }
	public function change_state(Request $request)
	{	$oCostCenter = CostCenter::find($request->centro_costo_id);
		if($request->accion=="ACTIVAR")
			$oCostCenter->estado="ACTIVO";
		if($request->accion=="INACTIVAR")
			$oCostCenter->estado="INACTIVO";
		$oCostCenter->save();
		return response()->json(array("result"=>"success","msg"=>"Todo OK","centro_costo_id"=>$oCostCenter->id));
	}
}
