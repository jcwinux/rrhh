<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\DocumentType;
use App\Department;
use App\Location;
use App\ContractType;
use App\Contract;
use App\Catalog;
use App\EmployeeType;
use App\Person;

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
		$tipos_empleado = EmployeeType::where('estado','ACTIVO')->get();
		$supervisores	= DB::table('people')->join('contracts','people.id','contracts.person_id')
						   ->where('contracts.es_supervisor',1)
						   ->where('contracts.estado','ACTIVO')
						   ->select('people.nombre_1','people.nombre_2','people.apellido_1','people.apellido_2','people.id')
						   ->get();
		$contratos		= DB::table('contracts')->join('jobs','contracts.job_id','jobs.id')
												->join('departments','contracts.department_id','departments.id')
												->join('contract_types','contracts.contract_type_id','contract_types.id')
												->join('people','contracts.person_id','people.id')
												->join('document_types','people.document_type_id','document_types.id')
												->where('contracts.estado','ACTIVO')
												->select('contracts.id','people.num_identificacion','document_types.descripcion as doc_descripcion','contract_types.nombre as tipo_contrato','jobs.nombre as cargo','departments.nombre as departamento','contracts.inicio_contrato','contracts.fin_contrato','contracts.estado')
												->get();
												
												
		return view('pages.personal.form_contrato',compact('str_random','tipo_doc','departamentos','tipos_contrato','ubicaciones','formas_pago', 'contratos','supervisores','tipos_empleado'));
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
    {	$json_contrato = json_decode($request->data,true);
		if ($json_contrato["contrato_id"]!="")
		{	$oContract = Contract::find($json_contrato["contrato_id"]);
			$oContract->estado = "INACTIVO";
			$oContract->save();
		}
		$oContract = new Contract();
		$oContract->person_id				= $json_contrato["persona_id"];
		$oContract->department_id			= $json_contrato["departamento_id"];
		$oContract->job_id					= $json_contrato["cargo_id"];
		$oContract->contract_type_id		= $json_contrato["tipo_contrato_id"];
		$oContract->location_id				= $json_contrato["departamento_id"];
		$oContract->catalog_forma_pago_id	= $json_contrato["forma_pago"];
		$oContract->employee_type_id		= $json_contrato["tipo_empleado"];
		$oContract->es_supervisor			= $json_contrato["es_supervisor"];
		$oContract->supervisor_id			= ($json_contrato["supervisado_por"]==""?NULL:$json_contrato["supervisado_por"]);
		$oContract->inicio_contrato			= $json_contrato["inicio_contrato"];
		$oContract->fin_contrato			= $json_contrato["fin_contrato"];
		$oContract->salario					= $json_contrato["sueldo"];
		$oContract->save();
		
		$oPerson = Person::find($json_contrato["persona_id"]);
		$oPerson->estado = "CONTRATADO";
		$oPerson->save();
		
		return response()->json(array("result"=>"success","msg"=>"Todo OK","contract_id"=>$oContract->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {	$contrato	= DB::table('contracts')->join('jobs','contracts.job_id','jobs.id')
												->join('departments','contracts.department_id','departments.id')
												->join('contract_types','contracts.contract_type_id','contract_types.id')
												->join('people','contracts.person_id','people.id')
												->join('document_types','people.document_type_id','document_types.id')
												->where('contracts.id',$id)
												->select('contracts.id','people.id as person_id','people.nombre_1','people.nombre_2','people.apellido_1','people.apellido_2','document_types.id as doc_id','contracts.employee_type_id','contracts.catalog_forma_pago_id as forma_pago_id','contract_types.id as contract_type_id','contracts.es_supervisor','contracts.supervisor_id','jobs.id as job_id','departments.id as department_id','contracts.salario','contracts.inicio_contrato','contracts.fin_contrato','contracts.estado')
												->first();
		return response()->json($contrato);
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
	{	$str_random 	= array (rand(0,30000),rand(0,30000),rand(0,30000));
		$contratos		= DB::table('contracts')->join('jobs','contracts.job_id','jobs.id')
												->join('departments','contracts.department_id','departments.id')
												->join('contract_types','contracts.contract_type_id','contract_types.id')
												->join('people','contracts.person_id','people.id')
												->join('document_types','people.document_type_id','document_types.id')
												->where('contracts.estado','ACTIVO')
												->select('contracts.id','people.num_identificacion','document_types.descripcion as doc_descripcion','contract_types.nombre as tipo_contrato','jobs.nombre as cargo','departments.nombre as departamento','contracts.inicio_contrato','contracts.fin_contrato','contracts.estado')
												->get();
		$html = view('pages.personal.tabla_contrato', compact('view','contratos','str_random'))->render();
        return response()->json(compact('html'));
	}
}
