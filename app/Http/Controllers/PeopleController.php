<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Person;
use App\Study;
use App\Training;
use App\PreviousJob;

class PeopleController extends Controller
{
    public function crearPersona(Request $request)
	{	DB::beginTransaction();
		/*Guardo JSON*/
		$json_persona = json_decode($request->data,true);
		if ($json_persona["person_id"]=="")
			$oPersona = new Person ();
		else
			$oPersona = Person::find($json_persona["person_id"]);
		
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
		
		/*Elimino las estudios anteriores*/
		Study::where('person_id',$oPersona->id)->delete();
		/*Guardo los estudios*/
		foreach ($json_persona["estudios"] as $estudio)
		{	$oEstudios = new Study();
			$oEstudios->person_id=$oPersona->id;
			$oEstudios->catalog_id_nivel_estudio = $estudio["nivel_estudio"];
			$oEstudios->institucion = $estudio["institucion"];
			$oEstudios->año = $estudio["año"];
			$oEstudios->save();
			if (!$oEstudios)
				DB::rollBack();
		}
		
		/*Elimino las capacitaciones anteriores*/
		Training::where('person_id',$oPersona->id)->delete();
		/*Guardo los capacitaciones*/
		foreach ($json_persona["cursos"] as $curso)
		{	$oCursos = new Training();
			$oCursos->person_id=$oPersona->id;
			/*Fecha desde*/
			$mes_desde = substr($curso["curso_fecha_desde"], 0, 2);
			$dia_desde = substr($curso["curso_fecha_desde"], 3, 2);
			$ano_desde = substr($curso["curso_fecha_desde"], 6,4); 
			/*Fecha hasta*/
			$mes_hasta = substr($curso["curso_fecha_hasta"], 0, 2);
			$dia_hasta = substr($curso["curso_fecha_hasta"], 3, 2);
			$ano_hasta = substr($curso["curso_fecha_hasta"], 6,4); 
			$oCursos->descripcion = $curso["curso"];
			$oCursos->institucion = $curso["institucion"];
			$oCursos->catalog_id_tipo_curso = $curso["tipo_curso"];
			$oCursos->catalog_id_modalidad = $curso["modalidad_curso"];
			$oCursos->fecha_inicio = $ano_desde.'-'.$mes_desde.'-'.$dia_desde;
			$oCursos->fecha_fin = $ano_hasta.'-'.$mes_hasta.'-'.$dia_hasta;
			$oCursos->numero_horas = $curso["horas"];
			$oCursos->save();
			if (!$oCursos)
				DB::rollBack();
		}
		
		/*Elimino las estudios anteriores*/
		PreviousJob::where('person_id',$oPersona->id)->delete();
		/*Guardo los estudios*/
		foreach ($json_persona["experiencias"] as $experiencia)
		{	$oExperiencias = new PreviousJob();
			$oExperiencias->person_id=$oPersona->id;
			$oExperiencias->empresa = $experiencia["empresa"];
			$oExperiencias->direccion = $experiencia["direccion"];
			$oExperiencias->cargo = $experiencia["cargo"];
			$oExperiencias->descripcion = $experiencia["funciones"];
			/*Fecha desde*/
			$mes_desde = substr($experiencia["exp_fecha_desde"], 0, 2);
			$dia_desde = substr($experiencia["exp_fecha_desde"], 3, 2);
			$ano_desde = substr($experiencia["exp_fecha_desde"], 6,4); 
			/*Fecha hasta*/
			$mes_hasta = substr($experiencia["exp_fecha_hasta"], 0, 2);
			$dia_hasta = substr($experiencia["exp_fecha_hasta"], 3, 2);
			$ano_hasta = substr($experiencia["exp_fecha_hasta"], 6,4); 
			$oExperiencias->desde = $ano_desde.'-'.$mes_desde.'-'.$dia_desde;
			$oExperiencias->hasta = $ano_hasta.'-'.$mes_hasta.'-'.$dia_hasta;
			$oExperiencias->save();
			if (!$oExperiencias)
				DB::rollBack();
		}
		DB::commit();
		print json_encode(array("result"=>"success","msg"=>"Todo OK","person_id"=>$oPersona->id));
	}
}
