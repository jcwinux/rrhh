<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ContractType;

class ContractTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	$tipos_contrato = ContractType::all();
		$str_random = array (rand(0,30000),rand(0,30000),rand(0,30000));
        return view('pages.personal.form_tipo_contrato',compact('str_random','tipos_contrato'));
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
    {	$json_contract_type = json_decode($request->data,true);
		if ($json_contract_type["tipo_contrato_id"]=="")
			$oTipoContrato = new ContractType();
		else
			$oTipoContrato = ContractType::find($json_contract_type["tipo_contrato_id"]);
		
		$oTipoContrato->nombre = $json_contract_type["nombre_tipo_contrato"];
		$oTipoContrato->descripcion = $json_contract_type["descripcion_tipo_contrato"];
		$oTipoContrato->save();
		return response()->json(array("result"=>"success","msg"=>"Todo OK","tipo_contrato_id"=>$oTipoContrato->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {	$oTipoContrato = ContractType::find($id);
		return response()->json($oTipoContrato);
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
	{	$tipos_contrato = ContractType::all();
		$html = view('pages.personal.tabla_tipo_contrato', compact('view','tipos_contrato'))->render();
        return response()->json(compact('html'));
	}
	
	public function change_state(Request $request)
    {	$oTipoContrato = ContractType::find($request->tipo_contrato_id);
		if($request->accion=="ACTIVAR")
			$oTipoContrato->estado="ACTIVO";
		if($request->accion=="INACTIVAR")
			$oTipoContrato->estado="INACTIVO";
		$oTipoContrato->save();
		return response()->json(array("result"=>"success","msg"=>"Todo OK","tipo_contrato_id"=>$oTipoContrato->id));
    }
}
