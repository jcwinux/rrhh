<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DocumentType;
use App\Department;
use App\Location;
use App\ContractType;
use App\Catalog;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	$str_random 	= array (rand(0,30000),rand(0,30000),rand(0,30000));
		$tipo_doc		= DocumentType::where(['estado'=>'ACTIVO'])->get();
		$departamentos 	= Department::where(['estado'=>'ACTIVO'])->get();
		$tipos_contrato	= ContractType::where(['estado'=>'ACTIVO'])->get();
		$ubicaciones	= Location::where(['estado'=>'ACTIVO'])->get();
		$formas_pago	= Catalog::where(['catalog_type_id'=>10,'estado'=>'ACTIVO'])->get();
		return view('pages.personal.form_contrato',compact('str_random','tipo_doc','departamentos','tipos_contrato','ubicaciones','formas_pago'));
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
}
