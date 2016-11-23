$(document).ready(function(){
	/*Configurando ajax*/
	$(function () {
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});
	});
	$('#agregar_ubicacion').on('click', function(e){
		$('#ubicacion_id').val('');
		$('#nombre_ubicacion').val('');
		$('#descripcion_ubicacion').val('');
	});
	$('#GuardarUbicacion').on('click', function(e){
		/*Validación de campos*/
		if (!$('#nombre_ubicacion').val())
		{	$('#nombre_ubicacion').addClass('parsley-error');
			return false;
		}
		else
		{	$('#nombre_ubicacion').removeClass('parsley-error');
		}
		if (!$('#descripcion_ubicacion').val())
		{	$('#descripcion_ubicacion').addClass('parsley-error');
			return false;
		}
		else
		{	$('#descripcion_ubicacion').removeClass('parsley-error');
		}
		ubicacion_id = $('#ubicacion_id').val();
		nombre_ubicacion = $('#nombre_ubicacion').val();
		descripcion_ubicacion = $('#descripcion_ubicacion').val();
		
		json_ubicacion = {};
		json_ubicacion["ubicacion_id"] = ubicacion_id;
		json_ubicacion["nombre_ubicacion"] = nombre_ubicacion;
		json_ubicacion["descripcion_ubicacion"] = descripcion_ubicacion;
		
		$.ajax({
			type: "POST",
			url: "guardarUbicacion",
			data: {data: JSON.stringify(json_ubicacion)},
			success: function(data){
				$('#ubicacion_id').val(data.ubicacion_id);
				Messenger().post("El registro ha sido grabado exitosamente!");
				cargarUbicaciones();
			},
			error: function(data){
				Messenger().post("¡Ocurrió un error!");
			}
		});
	});
});
function cargarUbicaciones()
{	$.get('/ajax-ubicaciones/', function (data){
		$('#tabla_ubicaciones').html(data.html);
	});
}
function showUbicacion(id)
{	$.get('/ajax-ubicacion_show/'+id, function (data){
		var json = data;
		$('#nombre_ubicacion').val(json.nombre);
		$('#descripcion_ubicacion').val(json.descripcion);
		$('#ubicacion_id').val(id);
	});
}
function change_state(ubicacion_id,action)
{	data_post = 'ubicacion_id='+ubicacion_id+'&accion='+action;
	$.ajax({
		type: "POST",
		url: "cambiarEstadoUbicacion",
		data: data_post,
		success: function(data){
			var json_x = data;
			/*Recarga la tabla de catálogo*/
			cargarUbicaciones();
			Messenger().post("El registro ha sido modificado exitosamente!");
		},
		error: function(data){
			Messenger().post("¡Ocurrió un error!");
		}
	});
}