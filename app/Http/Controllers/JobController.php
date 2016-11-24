<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Job;
use App\Department;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {	$departamentos = Department::where('estado','ACTIVO')->get();
		$str_random = array (rand(0,30000),rand(0,30000),rand(0,30000));
		return view('pages.personal.form_cargo',compact('str_random','departamentos'));
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
    {	if ($request->cargo_id=="")
			$oJob = new Job();
		else
			$oJob = Job::find($request->cargo_id);
		
		$oJob->departamento_id=$request->departamento_id;
		$oJob->nombre=$request->nombre;
		$oJob->descripcion=$request->descripcion;
		$oJob->save();
		return response()->json(array("result"=>"success","msg"=>"Todo OK","cargo_id"=>$oJob->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {	
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
	
	public function view($department_id)
	{	$cargos = Job::where('departamento_id','=',$department_id)->get();
		$html = view('pages.personal.tabla_cargo', compact('view','cargos'))->render();
        return response()->json(compact('html'));
	}
}
