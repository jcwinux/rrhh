$(document).ready(function(){
	/*Configurando ajax*/
	$(function () {
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});
	});
	
	$('#GuardarTipoContrato').on('click', function(e){
		/*Validación de campos*/
		if (!$('#nombre_tipo_contrato').val())
		{	$('#nombre_tipo_contrato').addClass('parsley-error');
			return false;
		}
		else
		{	$('#nombre_tipo_contrato').removeClass('parsley-error');
		}
		if (!$('#descripcion_tipo_contrato').val())
		{	$('#descripcion_tipo_contrato').addClass('parsley-error');
			return false;
		}
		else
		{	$('#descripcion_tipo_contrato').removeClass('parsley-error');
		}
		tipo_contrato_id = $('#tipo_contrato_id').val();
		nombre_tipo_contrato = $('#nombre_tipo_contrato').val();
		descripcion_tipo_contrato = $('#descripcion_tipo_contrato').val();
		
		json_tipo_contrato = {};
		json_tipo_contrato["tipo_contrato_id"] = tipo_contrato_id;
		json_tipo_contrato["nombre_tipo_contrato"] = nombre_tipo_contrato;
		json_tipo_contrato["descripcion_tipo_contrato"] = descripcion_tipo_contrato;
		
		$.ajax({
			type: "POST",
			url: "guardarTipoContrato",
			data: {data: JSON.stringify(json_tipo_contrato)},
			success: function(data){
				$('#tipo_contrato_id').val(data.tipo_contrato_id);
				Messenger().post("El registro ha sido grabado exitosamente!");
				cargarTiposContrato();
			},
			error: function(data){
				Messenger().post("¡Ocurrió un error!");
			}
		});
	});
	
	$('#btnBuscarPersona').on('click', function(e){
		/*Validación de campos*/
		if (!$('#num_identificacion').val())
		{	$('#num_identificacion').addClass('parsley-error');
			$('#num_identificacion').focus();
			return false;
		}
		else
		{	$('#num_identificacion').removeClass('parsley-error');
		}
		
		/*if (!$('#descripcion_tipo_contrato').val())
		{	$('#descripcion_tipo_contrato').addClass('parsley-error');
			return false;
		}
		else
		{	$('#descripcion_tipo_contrato').removeClass('parsley-error');
		}
		tipo_contrato_id = $('#tipo_contrato_id').val();
		nombre_tipo_contrato = $('#nombre_tipo_contrato').val();
		descripcion_tipo_contrato = $('#descripcion_tipo_contrato').val();
		
		json_tipo_contrato = {};
		json_tipo_contrato["tipo_contrato_id"] = tipo_contrato_id;
		json_tipo_contrato["nombre_tipo_contrato"] = nombre_tipo_contrato;
		json_tipo_contrato["descripcion_tipo_contrato"] = descripcion_tipo_contrato;
		*/
		$.get('/ajax-buscarPersonaByID/'+$('#num_identificacion').val()+'/'+$('#document_type').val(), function (data){
			var json = data;
			$('#apellido_persona').val(json.apellido_1+' '+json.apellido_1);
			$('#nombre_persona').val(json.nombre_1+' '+json.nombre_2);
		});
	});
});
function cargarTiposContrato()
{	$.get('/ajax-tipos_contrato/', function (data){
		$('#tabla_tipos_contrato').html(data.html);
	});
}
function showTipoContrato(id)
{	$.get('/ajax-tipo_contrato_show/'+id, function (data){
		var json = data;
		$('#nombre_tipo_contrato').val(json.nombre);
		$('#descripcion_tipo_contrato').val(json.descripcion);
		$('#tipo_contrato_id').val(id);
	});
}
function change_state(tipo_contrato_id_id,action)
{	data_post = 'tipo_contrato_id='+tipo_contrato_id_id+'&accion='+action;
	$.ajax({
		type: "POST",
		url: "cambiarEstadoTipoContrato",
		data: data_post,
		success: function(data){
			var json_x = data;
			/*Recarga la tabla de catálogo*/
			cargarTiposContrato();
			Messenger().post("El registro ha sido modificado exitosamente!");
		},
		error: function(data){
			Messenger().post("¡Ocurrió un error!");
		}
	});
}