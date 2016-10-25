<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Person;
use App\Study;
use App\Training;
use App\PreviousJob;
use App\Language;
use App\DocumentType;
use App\Province;
use App\City;
use App\Town;
use App\Catalog;
use App\Disability;

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
		
		$oPersona->fecha_ncto = $json_persona["fecha_ncto"];
		$oPersona->catalog_id_estado_civil = $json_persona["estado_civil"];
		$oPersona->trato = $json_persona["trato"];
		$oPersona->sexo = ($json_persona["sexo"]?1:0);
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
		
		/*Elimino los idiomas anteriores*/
		Language::where('person_id',$oPersona->id)->delete();
		/*Guardo los idiomas*/
		foreach ($json_persona["idiomas"] as $idioma)
		{	$oLanguages = new Language();
			$oLanguages->person_id=$oPersona->id;
			$oLanguages->catalog_id_idioma = $idioma["idioma"];
			$oLanguages->catalog_id_dominio_escrito = $idioma["dominio_escrito"];
			$oLanguages->catalog_id_dominio_leido = $idioma["dominio_leido"];
			$oLanguages->catalog_id_dominio_oral = $idioma["dominio_oral"];
			$oLanguages->save();
			if (!$oLanguages)
				DB::rollBack();
		}
		
		/*Elimino las capacitaciones anteriores*/
		Training::where('person_id',$oPersona->id)->delete();
		/*Guardo los capacitaciones*/
		foreach ($json_persona["cursos"] as $curso)
		{	$oCursos = new Training();
			$oCursos->person_id=$oPersona->id;
			$oCursos->descripcion = $curso["curso"];
			$oCursos->institucion = $curso["institucion"];
			$oCursos->catalog_id_tipo_curso = $curso["tipo_curso"];
			$oCursos->catalog_id_modalidad = $curso["modalidad_curso"];
			$oCursos->fecha_inicio = $curso["curso_fecha_desde"];
			$oCursos->fecha_fin = $curso["curso_fecha_hasta"];
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
			$oExperiencias->desde = $experiencia["exp_fecha_desde"];
			$oExperiencias->hasta = $experiencia["exp_fecha_hasta"];
			$oExperiencias->save();
			if (!$oExperiencias)
				DB::rollBack();
		}
		
		/*Elimino las discapacidades*/
		Disability::where('person_id',$oPersona->id)->delete();
		/*Guardo los discapacidades*/
		foreach ($json_persona["discapacidades"] as $discapacidad)
		{	$oDiscapacidades = new Disability();
			$oDiscapacidades->person_id=$oPersona->id;
			$oDiscapacidades->catalog_id_discapacidad = $discapacidad["discapacidad"];
			$oDiscapacidades->catalog_id_grado_discapacidad = $discapacidad["grado_discapacidad"];
			$oDiscapacidades->porcentaje = $discapacidad["porcentaje"];
			$oDiscapacidades->observacion = $discapacidad["observacion"];
			$oDiscapacidades->save();
			if (!$oDiscapacidades)
				DB::rollBack();
		}
		DB::commit();
		print json_encode(array("result"=>"success","msg"=>"Todo OK","person_id"=>$oPersona->id));
	}
	public function editarPersona($person_id,Request $request)
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
		
		$oPersona->fecha_ncto = $json_persona["fecha_ncto"];
		$oPersona->catalog_id_estado_civil = $json_persona["estado_civil"];
		$oPersona->trato = $json_persona["trato"];
		$oPersona->sexo = ($json_persona["sexo"]?1:0);
		
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
		
		/*Elimino los idiomas anteriores*/
		Language::where('person_id',$oPersona->id)->delete();
		/*Guardo los idiomas*/
		foreach ($json_persona["idiomas"] as $idioma)
		{	$oLanguages = new Language();
			$oLanguages->person_id=$oPersona->id;
			$oLanguages->catalog_id_idioma = $idioma["idioma"];
			$oLanguages->catalog_id_dominio_escrito = $idioma["dominio_escrito"];
			$oLanguages->catalog_id_dominio_leido = $idioma["dominio_leido"];
			$oLanguages->catalog_id_dominio_oral = $idioma["dominio_oral"];
			$oLanguages->save();
			if (!$oLanguages)
				DB::rollBack();
		}
		
		/*Elimino las capacitaciones anteriores*/
		Training::where('person_id',$oPersona->id)->delete();
		/*Guardo los capacitaciones*/
		foreach ($json_persona["cursos"] as $curso)
		{	$oCursos = new Training();
			$oCursos->person_id=$oPersona->id;
			$oCursos->descripcion = $curso["curso"];
			$oCursos->institucion = $curso["institucion"];
			$oCursos->catalog_id_tipo_curso = $curso["tipo_curso"];
			$oCursos->catalog_id_modalidad = $curso["modalidad_curso"];
			$oCursos->fecha_inicio = $curso["curso_fecha_desde"];
			$oCursos->fecha_fin = $curso["curso_fecha_hasta"];
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
			$oExperiencias->desde = $experiencia["exp_fecha_desde"];
			$oExperiencias->hasta = $experiencia["exp_fecha_hasta"];
			$oExperiencias->save();
			if (!$oExperiencias)
				DB::rollBack();
		}
		
		/*Elimino las discapacidades*/
		Disability::where('person_id',$oPersona->id)->delete();
		/*Guardo las discapacidades*/
		foreach ($json_persona["discapacidades"] as $discapacidad)
		{	$oDiscapacidades = new Disability();
			$oDiscapacidades->person_id=$oPersona->id;
			$oDiscapacidades->catalog_id_discapacidad = $discapacidad["discapacidad"];
			$oDiscapacidades->catalog_id_grado_discapacidad = $discapacidad["grado_discapacidad"];
			$oDiscapacidades->porcentaje = $discapacidad["porcentaje"];
			$oDiscapacidades->observacion = $discapacidad["observacion"];
			$oDiscapacidades->save();
			if (!$oDiscapacidades)
				DB::rollBack();
		}
		DB::commit();
		print json_encode(array("result"=>"success","msg"=>"Todo OK","person_id"=>$oPersona->id));
	}
	public function persona_new_view()
	{	$tipo_doc	= DocumentType::all();
		$provinc	= Province::all();
		$est_civil	= Catalog::where(['catalog_type_id'=>1,'estado'=>'ACTIVO'])->get();
		$niv_estudio = Catalog::where(['catalog_type_id'=>2,'estado'=>'ACTIVO'])->get();
		$tipo_curso	= Catalog::where(['catalog_type_id'=>3,'estado'=>'ACTIVO'])->get();
		$mod_curs	= Catalog::where(['catalog_type_id'=>4,'estado'=>'ACTIVO'])->get();
		$idiomas	= Catalog::where(['catalog_type_id'=>5,'estado'=>'ACTIVO'])->get();
		$dominios	= Catalog::where(['catalog_type_id'=>6,'estado'=>'ACTIVO'])->get();
		$habilidades	= Catalog::where(['catalog_type_id'=>7,'estado'=>'ACTIVO'])->get();
		$discapacidades	= Catalog::where(['catalog_type_id'=>8,'estado'=>'ACTIVO'])->get();
		$grado_discapacidad	= Catalog::where(['catalog_type_id'=>9,'estado'=>'ACTIVO'])->get();
		$str_random = array (rand(0,30000),rand(0,30000),rand(0,30000));
		return view('pages.reclutamiento.form_persona_crear',compact('tipo_doc','provinc','est_civil','niv_estudio','tipo_curso','mod_curs','idiomas','dominios','habilidades','discapacidades','grado_discapacidad','str_random'));
	}
	public function persona_edit_view(Request $request)
	{	$id = $request->person_id;
		$person	= Person::find($id);
		$tipo_doc	= DocumentType::all();
		$provinc	= Province::all();
		$city		= City::where('province_id',$person->province_id)->get();
		$town		= Town::where('city_id',$person->city_id)->get();
		$est_civil	= Catalog::where(['catalog_type_id'=>1,'estado'=>'ACTIVO'])->get();
		$niv_estudio = Catalog::where(['catalog_type_id'=>2,'estado'=>'ACTIVO'])->get();
		$tipo_curso	= Catalog::where(['catalog_type_id'=>3,'estado'=>'ACTIVO'])->get();
		$mod_curs	= Catalog::where(['catalog_type_id'=>4,'estado'=>'ACTIVO'])->get();
		$idiomas	= Catalog::where(['catalog_type_id'=>5,'estado'=>'ACTIVO'])->get();
		$dominios	= Catalog::where(['catalog_type_id'=>6,'estado'=>'ACTIVO'])->get();
		$habilidades	= Catalog::where(['catalog_type_id'=>7,'estado'=>'ACTIVO'])->get();
		$discapacidades	= Catalog::where(['catalog_type_id'=>8,'estado'=>'ACTIVO'])->get();
		$grado_discapacidad	= Catalog::where(['catalog_type_id'=>9,'estado'=>'ACTIVO'])->get();
		//$person_estudio = Person::where('person_id',$person->id)->get();
		$person_estudio = DB::table('studies')->join('catalogs','studies.catalog_id_nivel_estudio','=','catalogs.id')->where('person_id',$id)->select('studies.*','catalogs.descripcion')->get();
		$person_training = DB::table('trainings')->join('catalogs as cat_modalidad','trainings.catalog_id_modalidad','=','cat_modalidad.id')->join('catalogs as cat_tipo_curso','trainings.catalog_id_tipo_curso','=','cat_tipo_curso.id')->where('person_id',$id)->select('trainings.*','cat_modalidad.descripcion as desc_modalidad','cat_tipo_curso.descripcion as desc_tipo_curso')->get();
		$person_language = DB::table('languages')->join('catalogs as cat_idioma','languages.catalog_id_idioma','=','cat_idioma.id')->join('catalogs as cat_dominio_escrito','languages.catalog_id_dominio_escrito','=','cat_dominio_escrito.id')->join('catalogs as cat_dominio_leido','languages.catalog_id_dominio_leido','=','cat_dominio_leido.id')->join('catalogs as cat_dominio_oral','languages.catalog_id_dominio_oral','=','cat_dominio_oral.id')->where('languages.person_id',$id)->select('languages.*','cat_idioma.descripcion as desc_idioma','cat_dominio_escrito.descripcion as desc_dominio_escrito','cat_dominio_leido.descripcion as desc_dominio_leido','cat_dominio_oral.descripcion as desc_dominio_oral')->get();
		$person_disability = DB::table('disabilities')->join('catalogs as cat_discapacidad','disabilities.catalog_id_discapacidad','=','cat_discapacidad.id')->join('catalogs as cat_grado_discapacidad','disabilities.catalog_id_grado_discapacidad','=','cat_grado_discapacidad.id')->where('person_id',$id)->select('disabilities.*','cat_discapacidad.descripcion as desc_discapacidad','cat_grado_discapacidad.descripcion as desc_grado_discapacidad')->get();
		$str_random = array (rand(0,30000),rand(0,30000),rand(0,30000));
		$person_previous_job = DB::table('previous_jobs')->where('person_id',$id)->get();
		return view('pages.reclutamiento.form_persona_editar',compact('tipo_doc','provinc','city','town','est_civil','niv_estudio','tipo_curso','mod_curs','idiomas','dominios','habilidades','discapacidades','grado_discapacidad','person','person_estudio','person_training','person_language','person_previous_job','person_disability','str_random'));
	}
	public function personas_view()
	{	$personas	= DB::table('people')->join('document_types','people.document_type_id','=','document_types.id')->select('people.*','document_types.descripcion')->get();
		$str_random = array (rand(0,30000),rand(0,30000),rand(0,30000));
		return view('pages.reclutamiento.form_persona_buscar',compact('personas','str_random'));
	}
}
