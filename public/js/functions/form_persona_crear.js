$(document).ready(function(){
	/*Configurando ajax*/
	$(function () {
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});
	});
	/*Llena select de ciudades*/
	$('#provincia_residencia').on('change',function(e){
		var province_id = e.target.value;
		if (!province_id)
			province_id = -1;
		$.get('/ajax-cities/'+province_id, function (data){
			$('#ciudad_residencia').empty();
			$('#parroquia_residencia').empty();
			$('#ciudad_residencia').append('<option value=""></option');
			$.each(data, function (index, citiesObj){
				$('#ciudad_residencia').append('<option value="'+citiesObj.id+'">'+citiesObj.nombre+'</option');
			});
		});
	});
	/*Llena select de parroquias*/
	$('#ciudad_residencia').on('change',function(e){
		var city_id = e.target.value;
		if (!city_id)
			city_id = -1;
		$.get('/ajax-towns/'+city_id, function (data){
			$('#parroquia_residencia').empty();
			$('#parroquia_residencia').append('<option value=""></option');
			$.each(data, function (index, townsObj){
				$('#parroquia_residencia').append('<option value="'+townsObj.id+'">'+townsObj.nombre+'</option');
			});
		});
	});
	/*Agregar estudio*/
	$('#AgregarEstudio').on('click',function(e){
		/*Validación de campos*/
		if (!$('#institucion').val())
		{	$('#institucion').addClass('parsley-error');
			return false;
		}
		else
		{	$('#institucion').removeClass('parsley-error');
		}
		if (!$('#anio').val())
		{	$('#anio').addClass('parsley-error');
			return false;
		}
		else
		{	$('#anio').removeClass('parsley-error');
		}
		row = 
			'<tr>'+
				'<td data-nivel_estudio="'+$('#nivel_estudio option:selected').val()+'">'+$('#nivel_estudio option:selected').text()+'</td>'+
				'<td>'+$('#institucion').val()+'</td>'+
				'<td>'+$('#anio').val()+'</td>'+
				'<td class="text-align-center"><a class="btnDelEstudio"><span class="label label-danger">X</span></a></td>'+
			'</tr>';
		$('#nivel_estudio').val($('#nivel_estudio option:first').val());
		$('#institucion').val("");
		$('#anio').val("");
		
		$('#det_estudios_agregados').append(row);
	});
	/*Quitar estudio*/
	$('#estudios_agregados').on('click','.btnDelEstudio', function (){
		$(this).closest('tr').remove();
	});
	/*Agregar idioma*/
	$('#AgregarIdioma').on('click',function(e){
		row = 
			'<tr>'+
				'<td data-idioma="'+$('#idioma option:selected').val()+'">'+$('#idioma option:selected').text()+'</td>'+
				'<td data-habilidad="'+$('#hablidad option:selected').val()+'">'+$('#hablidad option:selected').text()+'</td>'+
				'<td data-dominio="'+$('#dominio option:selected').val()+'">'+$('#dominio option:selected').text()+'</td>'+
				'<td class="text-align-center"><a class="btnDelIdioma"><span class="label label-danger">X</span></a></td>'+
			'</tr>';
		$('#idioma').val($('#idioma option:first').val());
		$('#hablidad').val($('#hablidad option:first').val());
		$('#dominio').val($('#dominio option:first').val());
		
		$('#det_idiomas_agregados').append(row);
	});
	/*Quitar idioma*/
	$('#idiomas_agregados').on('click','.btnDelIdioma', function (){
		$(this).closest('tr').remove();
	});
	/*Agregar curso*/
	$('#AgregarCurso').on('click',function(e){
		/*Validación de campos*/
		if (!$('#curso').val())
		{	$('#curso').addClass('parsley-error');
			return false;
		}
		else
		{	$('#curso').removeClass('parsley-error');
		}
		if (!$('#institucion_curso').val())
		{	$('#institucion_curso').addClass('parsley-error');
			return false;
		}
		else
		{	$('#institucion_curso').removeClass('parsley-error');
		}
		if (!$('#curso_fecha_desde').val())
		{	$('#curso_fecha_desde').addClass('parsley-error');
			return false;
		}
		else
		{	$('#curso_fecha_desde').removeClass('parsley-error');
		}
		if (!$('#curso_fecha_hasta').val())
		{	$('#curso_fecha_hasta').addClass('parsley-error');
			return false;
		}
		else
		{	$('#curso_fecha_hasta').removeClass('parsley-error');
		}
		if (!$('#horas_curso').val())
		{	$('#horas_curso').addClass('parsley-error');
			return false;
		}
		else
		{	$('#horas_curso').removeClass('parsley-error');
		}
		row = 
			'<tr>'+
				'<td>'+$('#curso').val()+'</td>'+
				'<td>'+$('#institucion_curso').val()+'</td>'+
				'<td data-tipo_curso="'+$('#tipo_curso option:selected').val()+'">'+$('#tipo_curso option:selected').text()+'</td>'+
				'<td data-modalidad_curso="'+$('#modalidad_curso option:selected').val()+'">'+$('#modalidad_curso option:selected').text()+'</td>'+
				'<td>'+$('#curso_fecha_desde').val()+'</td>'+
				'<td>'+$('#curso_fecha_hasta').val()+'</td>'+
				'<td>'+$('#horas_curso').val()+'</td>'+
				'<td class="text-align-center"><a class="btnDelCurso"><span class="label label-danger">X</span></a></td>'+
			'</tr>';
		$('#curso').val("");
		$('#institucion_curso').val("");
		$('#horas_curso').val("");
		$('#curso_fecha_desde').val("");
		$('#curso_fecha_hasta').val("");
		$('#tipo_curso').val($('#tipo_curso option:first').val());
		$('#modalidad_curso').val($('#modalidad_curso option:first').val());
		
		$('#det_cursos_realizados').append(row);
		
		
		$('#det_cursos_realizados').find('tr').each(function(i,el){
			var $tds = $(this).find('td');
			var curso = $tds.eq(0).text();
			var institucion = $tds.eq(1).text();
			var horas = $tds.eq(2).text();
			var año = $tds.eq(3).text();
		});
		
		
	});
	/*Quitar curso*/
	$('#cursos_realizados').on('click','.btnDelCurso', function (){
		$(this).closest('tr').remove();
	});
	
	/*Agregar experiencia*/
	$('#AgregarExperienciaLaboral').on('click',function(e){
		/*Validación de campos*/
		if (!$('#empresa').val())
		{	$('#empresa').addClass('parsley-error');
			return false;
		}
		else
		{	$('#empresa').removeClass('parsley-error');
		}
		if (!$('#direccion').val())
		{	$('#direccion').addClass('parsley-error');
			return false;
		}
		else
		{	$('#direccion').removeClass('parsley-error');
		}
		if (!$('#cargo').val())
		{	$('#cargo').addClass('parsley-error');
			return false;
		}
		else
		{	$('#cargo').removeClass('parsley-error');
		}
		if (!$('#exp_fecha_desde').val())
		{	$('#exp_fecha_desde').addClass('parsley-error');
			return false;
		}
		else
		{	$('#exp_fecha_desde').removeClass('parsley-error');
		}
		if (!$('#exp_fecha_hasta').val())
		{	$('#exp_fecha_hasta').addClass('parsley-error');
			return false;
		}
		else
		{	$('#exp_fecha_hasta').removeClass('parsley-error');
		}
		if (!$('#exp_descripcion').val())
		{	$('#exp_descripcion').addClass('parsley-error');
			return false;
		}
		else
		{	$('#exp_descripcion').removeClass('parsley-error');
		}
		row = 
			'<tr>'+
				'<td>'+$('#empresa').val()+'</td>'+
				'<td>'+$('#direccion').val()+'</td>'+
				'<td>'+$('#cargo').val()+'</td>'+
				'<td>'+$('#exp_fecha_desde').val()+
				'<td>'+$('#exp_fecha_hasta').val()+
				'<td>'+$('#exp_descripcion').val()+
				'</td><td class="text-align-center"><a class="btnDelExperiencia"><span class="label label-danger">X</span></a></td>'+
			'</tr>';
		$('#empresa').val("");
		$('#direccion').val("");
		$('#cargo').val("");
		$('#exp_fecha_desde').val("");
		$('#exp_fecha_hasta').val("");
		$('#exp_descripcion').val("");
		
		$('#det_experiencias_laborales').append(row);
	});
	/*Quitar experiencia laboral*/
	$('#experiencias_laborales').on('click','.btnDelExperiencia', function (){
		$(this).closest('tr').remove();
	});
	
	/*Crea una nueva persona*/
	$('#persona-form').submit(function(e){
		e.preventDefault();
		
		var person_id = $('#person_id').val();
		var num_identificacion = $('#num_identificacion').val();
		var document_type = $('#document_type').val();
		var primer_nombre = $('#primer_nombre').val();
		var segundo_nombre = $('#segundo_nombre').val();
		var primer_apellido = $('#primer_apellido').val();
		var segundo_apellido = $('#segundo_apellido').val();
		var sexo = $('#hombre').is(':checked');
		var fecha_ncto = $('#fecha_ncto').val();
		var nacionalidad = $('#nacionalidad').val();
		var trato = $('#trato').val();
		var correo_electronico = $('#correo_electronico').val();
		var numero_convencional = $('#numero_convencional').val();
		var numero_celular = $('#numero_celular').val();
		var provincia_residencia = $('#provincia_residencia').val();
		var ciudad_residencia = $('#ciudad_residencia').val();
		var parroquia_residencia = $('#parroquia_residencia').val();
		
		var calle_principal = $('#calle_principal').val();
		var calle_transversal = $('#calle_transversal').val();
		var manzana = $('#manzana').val();
		var villa = $('#villa').val();
		
		json_persona = {};
		json_persona["person_id"]=person_id;
		json_persona["num_identificacion"]=num_identificacion;
		json_persona["document_type"]=document_type;
		json_persona["primer_nombre"]=primer_nombre;
		json_persona["segundo_nombre"]=segundo_nombre;
		json_persona["primer_apellido"]=primer_apellido;
		json_persona["segundo_apellido"]=segundo_apellido;
		json_persona["sexo"]=sexo;
		json_persona["fecha_ncto"]=fecha_ncto;
		json_persona["nacionalidad"]=nacionalidad;
		json_persona["trato"]=trato;
		json_persona["correo_electronico"]=correo_electronico;
		json_persona["numero_convencional"]=numero_convencional;
		json_persona["numero_celular"]=numero_celular;
		json_persona["provincia_residencia"]=provincia_residencia;
		json_persona["ciudad_residencia"]=ciudad_residencia;
		json_persona["parroquia_residencia"]=parroquia_residencia;
		json_persona["calle_principal"]=calle_principal;
		json_persona["calle_transversal"]=calle_transversal;
		json_persona["manzana"]=manzana;
		json_persona["villa"]=villa;
		
		
		json_estudios = [];
		$('#det_estudios_agregados').find('tr').each(function(i,el){
			var $tds = $(this).find('td');
			var nivel_estudio = $tds.eq(0).attr('data-nivel_estudio');
			var institucion = $tds.eq(1).text();
			var año = $tds.eq(2).text();
			
			item = {}
			item["nivel_estudio"]=nivel_estudio;
			item["institucion"]=institucion;
			item["año"]=año;
			
			json_estudios.push(item);
		});
		json_persona["estudios"] = json_estudios;
		
		json_cursos = [];
		$('#det_cursos_realizados').find('tr').each(function(i,el){
			var $tds = $(this).find('td');
			var curso = $tds.eq(0).text();
			var institucion = $tds.eq(1).text();
			var tipo_curso = $tds.eq(2).attr('data-tipo_curso');
			var modalidad_curso = $tds.eq(3).attr('data-modalidad_curso');
			var curso_fecha_desde = $tds.eq(4).text();
			var curso_fecha_hasta = $tds.eq(5).text();
			var horas = $tds.eq(6).text();
			
			item = {}
			item["curso"]=curso;
			item["institucion"]=institucion;
			item["tipo_curso"]=tipo_curso;
			item["modalidad_curso"]=modalidad_curso;
			item["curso_fecha_desde"]=curso_fecha_desde;
			item["curso_fecha_hasta"]=curso_fecha_hasta;
			item["horas"]=horas;
			
			
			json_cursos.push(item);
		});
		json_persona["cursos"] = json_cursos;
		
		
		json_idiomas = [];
		$('#det_idiomas_agregados').find('tr').each(function(i,el){
			var $tds = $(this).find('td');
			var idioma = $tds.eq(0).attr('data-idioma');
			var habilidad = $tds.eq(1).attr('data-habilidad');
			var dominio = $tds.eq(2).attr('data-dominio');
			
			item = {}
			item["idioma"]=idioma;
			item["habilidad"]=habilidad;
			item["dominio"]=dominio;
			
			json_idiomas.push(item);
		});
		json_persona["idiomas"] = json_idiomas;
		
		
		json_experiencias = [];
		$('#det_experiencias_laborales').find('tr').each(function(i,el){
			var $tds = $(this).find('td');
			var empresa = $tds.eq(0).text();
			var direccion = $tds.eq(1).text();
			var cargo = $tds.eq(2).text();
			var exp_fecha_desde = $tds.eq(3).text();
			var exp_fecha_hasta = $tds.eq(4).text();
			var funciones = $tds.eq(5).text();
			
			item = {}
			item["empresa"]=empresa;
			item["direccion"]=direccion;
			item["cargo"]=cargo;
			item["exp_fecha_desde"]=exp_fecha_desde;
			item["exp_fecha_hasta"]=exp_fecha_hasta;
			item["funciones"]=funciones;
			
			
			json_experiencias.push(item);
		});
		json_persona["experiencias"] = json_experiencias;
		
		$.ajax({
			type: "POST",
			url: "crearPersona",
			data: {data: JSON.stringify(json_persona)},
			success: function(data){
				var json_x = $.parseJSON(data);
				console.log(json_x);
				$("#person_id").val(json_x.person_id);
				Messenger().post("El registro ha sido grabado exitosamente!");
			},
			error: function(data){
				Messenger().post("¡Ocurrió un error!");
			}
		});
	});
});