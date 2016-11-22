$(document).ready(function(){
	/*Configurando ajax*/
	$(function () {
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});
	});
	$('#agregar_departamento').on('click', function(e){
		$('#departamento_id').val('');
		$('#nombre_departamento').val('');
		$('#descripcion_departamento').val('');
	});
	$('#GuardarDepartamento').on('click', function(e){
		/*Validación de campos*/
		if (!$('#nombre_departamento').val())
		{	$('#nombre_departamento').addClass('parsley-error');
			return false;
		}
		else
		{	$('#nombre_departamento').removeClass('parsley-error');
		}
		if (!$('#descripcion_departamento').val())
		{	$('#descripcion_departamento').addClass('parsley-error');
			return false;
		}
		else
		{	$('#descripcion_departamento').removeClass('parsley-error');
		}
		departamento_id = $('#departamento_id').val();
		nombre_departamento = $('#nombre_departamento').val();
		descripcion_departamento = $('#descripcion_departamento').val();
		
		json_departamento = {};
		json_departamento["departamento_id"] = departamento_id;
		json_departamento["nombre_departamento"] = nombre_departamento;
		json_departamento["descripcion_departamento"] = descripcion_departamento;
		
		$.ajax({
			type: "POST",
			url: "guardarDepartamento",
			data: {data: JSON.stringify(json_departamento)},
			success: function(data){
				$('#departamento_id').val(data.departamento_id);
				Messenger().post("El registro ha sido grabado exitosamente!");
				cargarDepartamentos();
			},
			error: function(data){
				Messenger().post("¡Ocurrió un error!");
			}
		});
	});
});
function cargarDepartamentos()
{	$.get('/ajax-departamentos/', function (data){
		$('#tabla_departamentos').html(data.html);
	});
}
function showDepartamento(id)
{	$.get('/ajax-departamento_show/'+id, function (data){
		var json = data;
		$('#nombre_departamento').val(json.nombre);
		$('#descripcion_departamento').val(json.descripcion);
		$('#departamento_id').val(id);
	});
}
function change_state(departamento_id,action)
{	data_post = 'departamento_id='+departamento_id+'&accion='+action;
	$.ajax({
		type: "POST",
		url: "cambiarEstadoDepartamento",
		data: data_post,
		success: function(data){
			var json_x = data;
			/*Recarga la tabla de catálogo*/
			cargarDepartamentos();
			Messenger().post("El registro ha sido modificado exitosamente!");
		},
		error: function(data){
			Messenger().post("¡Ocurrió un error!");
		}
	});
}