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
		row = '<tr><td>'+$('#nivel_estudio option:selected').text()+
			  '</td><td>'+$('#institucion').val()+'</td><td>'+$('#anio').val()+
			  '</td><td class="text-align-center"><a href="#"><span class="label label-danger">X</span></a></td></tr>';
		$('#nivel_estudio').val("");
		$('#institucion').val("");
		$('#anio').val("");
		
		$('#det_estudios_agregados').append(row);
	});
	/*Agregar curso*/
	$('#AgregarCurso').on('click',function(e){
		row = '<tr><td>'+$('#curso').val()+
			  '</td><td>'+$('#institucion_curso').val()+'</td><td>'+$('#horas_curso').val()+'</td><td>'+$('#anio_curso').val()+
			  '</td><td class="text-align-center"><a href="#"><span class="label label-danger">X</span></a></td></tr>';
		$('#curso').val("");
		$('#institucion_curso').val("");
		$('#horas_curso').val("");
		$('#anio_curso').val("");
		
		$('#det_cursos_realizados').append(row);
	});
	/*Agregar experiencia*/
	$('#AgregarExperienciaLaboral').on('click',function(e){
		row = '<tr><td>'+$('#empresa').val()+
			  '</td><td>'+$('#cargo').val()+'</td><td>'+$('#fecha_desde').val()+'<td>'+$('#fecha_hasta').val()+
			  '</td><td class="text-align-center"><a href="#"><span class="label label-danger">X</span></a></td></tr>';
		$('#empresa').val("");
		$('#cargo').val("");
		$('#desde').val("");
		$('#hasta').val("");
		
		$('#det_experiencias_laborales').append(row);
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
		
		json_cursos = [];
		$('#det_cursos_realizados').find('tr').each(function(i,el){
			var $tds = $(this).find('td');
			var curso = $tds.eq(0).text();
			var institucion = $tds.eq(1).text();
			var horas = $tds.eq(2).text();
			var año = $tds.eq(3).text();
			
			item = {}
			item["curso"]=curso;
			item["institucion"]=institucion;
			item["horas"]=horas;
			item["año"]=año;
			
			json_cursos.push(item);
		});
		json_persona["cursos"] = json_cursos;
		
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
				  
			}
		});
	});
});