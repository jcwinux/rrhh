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
	/*Crea una nueva persona*/
	$('#persona-form').submit(function(e){
		e.preventDefault();
		
		Messenger().post("El registro ha sido grabado exitosamente!");
		
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
		
		var dataString = 'num_identificacion='+num_identificacion+'&document_type='+document_type+'&primer_nombre='+primer_nombre+'&segundo_nombre='+segundo_nombre+
						 '&primer_apellido='+primer_apellido+'&segundo_apellido='+segundo_apellido+'&sexo='+sexo+'&fecha_ncto='+fecha_ncto+'&nacionalidad='+nacionalidad+
						 '&trato='+trato+'&correo_electronico='+correo_electronico+'&numero_convencional='+numero_convencional+'&numero_celular='+numero_celular+
						 '&provincia_residencia='+provincia_residencia+'&ciudad_residencia='+ciudad_residencia+'&parroquia_residencia='+parroquia_residencia+'&calle_principal='+calle_principal+
						 '&calle_transversal='+calle_transversal+'&manzana='+manzana+'&villa='+villa;
		
		$.ajax({
			type: "POST",
			url: "crearPersona",
			data: dataString,
			success: function(data){
				console.log(data);
			},
			error: function(data){
				console.log(data);
			}
		});
	});
});