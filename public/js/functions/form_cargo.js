$(document).ready(function(){
	/*Configurando ajax*/
	$(function () {
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});
	});
	
	$('#departamento').on('change', function(e){
		var departamento = e.target.value;
		if (!departamento)
			departamento = -1;
		cargarCargos(departamento);
	});
	
	$('#GuardarCargo').on('click', function(e){
		/*Validación de campos*/
		if (!$('#nombre').val())
		{	$('#nombre').addClass('parsley-error');
			return false;
		}
		else
		{	$('#nombre').removeClass('parsley-error');
		}
		if (!$('#descripcion').val())
		{	$('#descripcion').addClass('parsley-error');
			return false;
		}
		else
		{	$('#descripcion').removeClass('parsley-error');
		}
		cargo_id = $('#cargo_id').val();
		nombre = $('#nombre').val();
		descripcion = $('#descripcion').val();
		departamento_id = $('#departamento_nuevo option:selected').val();
		sueldo_referencial = $('#sueldo_referencial').val();
		codigo_sectorial = $('#codigo_sectorial').val();
		data_post = 'cargo_id='+cargo_id+'&departamento_id='+departamento_id+'&nombre='+nombre+'&descripcion='+descripcion+'&sueldo_referencial='+sueldo_referencial+'&codigo_sectorial='+codigo_sectorial;
		$.ajax({
			type: "POST",
			url: "guardarCargo",
			data: data_post,
			success: function(data){
				var json_x = data;
				console.log(json_x);
				/*Recarga la tabla de catálogo*/
				cargarCargos(departamento_id);
				Messenger().post("El registro ha sido grabado exitosamente!");
			},
			error: function(data){
				Messenger().post("¡Ocurrió un error!");
			}
		});
	});
});
function clear()
{	$('#nombre').val('');
	$('#descripcion').val('');
	$('#codigo_sectorial').val('');
	$('#sueldo_referencial').val('');
	$('#cargo_id').val('');
}
function cargarCargos(departamento)
{	if(!departamento)
		departamento=-1;
	$.get('/ajax-cargos/'+departamento, function (data){
		$('#tabla_cargos').html(data.html);
		$('#departamento_nuevo').val(departamento);
	});
}
function showCargo(id)
{	$.get('/ajax-cargo_show/'+id, function (data){
		var json = data;
		$("#departamento_nuevo").val(json.departamento_id);
		$('#nombre').val(json.nombre);
		$('#descripcion').val(json.descripcion);
		$('#codigo_sectorial').val(json.codigo_sectorial);
		$('#sueldo_referencial').val(json.sueldo_referencial);
		$('#cargo_id').val(json.id);
	});
}
function change_state(cargo_id,action)
{	data_post = 'cargo_id='+cargo_id+'&accion='+action;
		$.ajax({
			type: "POST",
			url: "cambiarEstadoCargo",
			data: data_post,
			success: function(data){
				var json_x = data;
				console.log(json_x);
				/*Recarga la tabla de catálogo*/
				cargarCargos($('#departamento option:selected').val());
				Messenger().post("El registro ha sido modificado exitosamente!");
			},
			error: function(data){
				Messenger().post("¡Ocurrió un error!");
			}
		});
}