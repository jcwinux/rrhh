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
		
		var primer_nombre = $('#primer_nombre').val();
		var dataString = 'primer_nombre='+primer_nombre;
		$.ajax({
			type: "POST",
			url: "crearPersona",
			data: dataString,
			success: function(data){
				console.log(data);
			}
		});
	});
});