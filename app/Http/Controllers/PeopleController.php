<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Person;
use App\Training;

class PeopleController extends Controller
{
    public function crearPersona(Request $request)
	{	DB::beginTransaction();
		/*Guardo JSON*/
		$json_persona = json_decode($request->data,true);
		
		$oPersona = new Person ();
		$oPersona->document_type_id = $json_persona["document_type"];
		$oPersona->num_identificacion = $json_persona["num_identificacion"];
		$oPersona->nombre_1 = $json_persona["primer_nombre"];
		$oPersona->nombre_2 = $json_persona["segundo_nombre"];
		$oPersona->apellido_1 = $json_persona["primer_apellido"];
		$oPersona->apellido_2 = $json_persona["segundo_apellido"];
		$oPersona->nacionalidad = $json_persona["nacionalidad"];
		/*Fecha nacimiento*/
		$mes = substr($json_persona["fecha_ncto"], 0, 2);
		$dia = substr($json_persona["fecha_ncto"], 3, 2);
		$ano = substr($json_persona["fecha_ncto"], 6,4); 
		
		$oPersona->fecha_ncto = $ano.'-'.$mes.'-'.$dia;
		$oPersona->trato = $json_persona["trato"];
		$oPersona->sexo = ($json_persona["sexo"]?1:0);
		$oPersona->discapacidad = 0;
		$oPersona->grupo_sanguineo = '';
		$oPersona->email_institucional = '';
		$oPersona->email_personal = $json_persona["correo_electronico"];
		$oPersona->telefono_convencional = $json_persona["numero_convencional"];
		$oPersona->telefono_celular = $json_persona["numero_celular"];
		$oPersona->province_id = $json_persona["provincia_residencia"];
		$oPersona->city_id = $json_persona["ciudad_residencia"];
		$oPersona->town_id = $json_persona["parroquia_residencia"];
		$oPersona->calle_principal = $json_persona["calle_principal"];
		$oPersona->calle_transversal = $json_persona["calle_transversal"];
		$oPersona->manzana = $json_persona["manzana"];
		$oPersona->villa = $json_persona["villa"];
		$oPersona->username = $json_persona["num_identificacion"];
		$oPersona->password = bcrypt($json_persona["num_identificacion"]);
		$oPersona->save();
		
		/*Guardo los capacitaciones*/
		foreach ($json_persona["cursos"] as $cursos)
		{	$oCursos = new Training();
			$oCursos->person_id=$oPersona->id;
			$oCursos->descripcion = $cursos["curso"];
			$oCursos->institucion = $cursos["institucion"];
			$oCursos->numero_horas = $cursos["horas"];
			$oCursos->año = $cursos["añoi"];
			$oCursos->save();
			if (!$oCursos)
			{
				DB::rollBack();
			}
		}
		DB::commit();
		print json_encode(array("result"=>"success","msg"=>"Todo OK","usuario"=>$oPersona->id));
	}
}
