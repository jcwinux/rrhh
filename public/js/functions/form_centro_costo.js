$(document).ready(function(){
	/*Configurando ajax*/
	$(function () {
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});
	});
	$('#agregar_centro_costo').on('click', function(e){
		$('#centro_costo_id').val('');
		$('#nombre_centro_costo').val('');
		$('#descripcion_centro_costo').val('');
		$('#cuenta_contable_centro_costo').val('');
	});
	$('#GuardarCentroCosto').on('click', function(e){
		/*Validación de campos*/
		if (!$('#nombre_centro_costo').val())
		{	$('#nombre_centro_costo').addClass('parsley-error');
			return false;
		}
		else
		{	$('#nombre_centro_costo').removeClass('parsley-error');
		}
		if (!$('#descripcion_centro_costo').val())
		{	$('#descripcion_centro_costo').addClass('parsley-error');
			return false;
		}
		else
		{	$('#descripcion_centro_costo').removeClass('parsley-error');
		}
		if (!$('#cuenta_contable_centro_costo').val())
		{	$('#cuenta_contable_centro_costo').addClass('parsley-error');
			return false;
		}
		else
		{	$('#cuenta_contable_centro_costo').removeClass('parsley-error');
		}
		centro_costo_id = $('#centro_costo_id').val();
		nombre_centro_costo = $('#nombre_centro_costo').val();
		descripcion_centro_costo = $('#descripcion_centro_costo').val();
		cuenta_contable_centro_costo = $('#cuenta_contable_centro_costo').val();
		
		json_centro_costo = {};
		json_centro_costo["centro_costo_id"] = centro_costo_id;
		json_centro_costo["nombre_centro_costo"] = nombre_centro_costo;
		json_centro_costo["descripcion_centro_costo"] = descripcion_centro_costo;
		json_centro_costo["cuenta_contable_centro_costo"] = cuenta_contable_centro_costo;
		
		$.ajax({
			type: "POST",
			url: "guardarCentroCosto",
			data: {data: JSON.stringify(json_centro_costo)},
			success: function(data){
				$('#centro_costo_id').val(data.centro_costo_id);
				Messenger().post("El registro ha sido grabado exitosamente!");
				cargarCentrosCostos();
			},
			error: function(data){
				Messenger().post("¡Ocurrió un error!");
			}
		});
	});
});
function cargarCentrosCostos()
{	$.get('/ajax-centros_costos/', function (data){
		$('#tabla_centros_costos').html(data.html);
	});
}
function showCentroCosto(id)
{	$.get('/ajax-centro_costo_show/'+id, function (data){
		var json = data;
		$('#nombre_centro_costo').val(json.nombre);
		$('#descripcion_centro_costo').val(json.descripcion);
		$('#cuenta_contable_centro_costo').val(json.cuenta_contable);
		$('#centro_costo_id').val(id);
	});
}
function change_state(centro_costo_id,action)
{	data_post = 'centro_costo_id='+centro_costo_id+'&accion='+action;
	$.ajax({
		type: "POST",
		url: "cambiarEstadoCentroCosto",
		data: data_post,
		success: function(data){
			var json_x = data;
			/*Recarga la tabla de catálogo*/
			cargarCentrosCostos();
			Messenger().post("El registro ha sido modificado exitosamente!");
		},
		error: function(data){
			Messenger().post("¡Ocurrió un error!");
		}
	});
}