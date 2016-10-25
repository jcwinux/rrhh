<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Catalog;
use App\CatalogType;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	$tipo_cat = CatalogType::all();
		$str_random = array (rand(0,30000),rand(0,30000),rand(0,30000));
		return view('pages.configuracion.form_catalogo',compact('str_random','tipo_cat'));
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
    {	if ($request->catalog_id=="")
			$oCatalog = new Catalog();
		else
			$oCatalog = Catalog::find($request->catalog_id);
		
		$oCatalog->catalog_type_id=$request->catalog_type_id;
		$oCatalog->descripcion=$request->descripcion;
		$oCatalog->save();
		print json_encode(array("result"=>"success","msg"=>"Todo OK","catalog_id"=>$oCatalog->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($catalog_id)
    {	$oCatalog = Catalog::find($catalog_id);
		print json_encode($oCatalog);
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
    {	$oCatalog = Catalog::find($request->catalog_id);
		if($request->accion=="ACTIVAR")
			$oCatalog->estado="ACTIVO";
		if($request->accion=="INACTIVAR")
			$oCatalog->estado="INACTIVO";
		$oCatalog->save();
		print json_encode(array("result"=>"success","msg"=>"Todo OK","catalog_id"=>$oCatalog->id));
    }
}
