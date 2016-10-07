<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Person;

class PeopleController extends Controller
{
    public function crearPersona(Request $request)
	{	try{
			$oPersona = new Person ();
			$oPersona->document_type_id = $request->document_type;
			$oPersona->num_identificacion = $request->num_identificacion;
			$oPersona->nombre_1 = $request->primer_nombre;
			$oPersona->nombre_2 = $request->segundo_nombre;
			$oPersona->apellido_1 = $request->primer_apellido;
			$oPersona->apellido_2 = $request->segundo_apellido;
			$oPersona->nacionalidad = $request->nacionalidad;
			/*Fecha nacimiento*/
			$mes = substr($request->fecha_ncto, 0, 2);
			$dia = substr($request->fecha_ncto, 3, 2);
			$ano = substr($request->fecha_ncto, 6,4); 
			$oPersona->fecha_ncto = $ano.'-'.$mes.'-'.$dia;
			$oPersona->trato = $request->trato;
			$oPersona->sexo = ($request->sexo?1:0);
			$oPersona->discapacidad = 0;
			$oPersona->grupo_sanguineo = '';
			$oPersona->email_institucional = '';
			$oPersona->email_personal = $request->correo_electronico;
			$oPersona->telefono_convencional = $request->numero_convencional;
			$oPersona->telefono_celular = $request->numero_celular;
			$oPersona->province_id = $request->provincia_residencia;
			$oPersona->city_id = $request->ciudad_residencia;
			$oPersona->town_id = $request->parroquia_residencia;
			$oPersona->calle_principal = $request->calle_principal;
			$oPersona->calle_transversal = $request->calle_transversal;
			$oPersona->manzana = $request->manzana;
			$oPersona->villa = $request->villa;
			$oPersona->username = $request->num_identificacion;
			$oPersona->password = bcrypt($request->num_identificacion);
			//$oPersona->created_at = Carbon\Carbon::now()->todatetimestring();
			$oPersona->save();
			//print json_encode(array("result"=>"success","msg"=>"Todo OK"));
			return $oPersona;
		}
		catch (Exception $e){
			//print json_encode(array("result"=>"fail","msg"=>$e->getMessage()));
			echo $e->getMessage();
		}
	}
}
