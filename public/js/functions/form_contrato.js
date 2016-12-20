$(document).ready(function(){
	/*Configurando ajax*/
	$(function () {
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});
	});
	
	/**/
	$("#btnOpenModal").click(function(){
		$("#modalBusquedaPersona").modal();
	});
	
	/*Llena los cargos que trabajan en un departamento*/
	$('#sel_departamentos').on('change',function(e){
		var department_id = e.target.value;
		if (!department_id)
			department_id = -1;
		$.get('/ajax-cargos_departamento/'+department_id, function (data){
			$('#sel_cargos').empty();
			$('#sueldo_referencial').val('');
			$('#sel_cargos').append('<option value=""></option');
			$.each(data, function (index, cargosObj){
				$('#sel_cargos').append('<option value="'+cargosObj.id+'" data-sueldo="'+cargosObj.sueldo_referencial+'">'+cargosObj.codigo_sectorial+': '+cargosObj.nombre+'</option>');
			});
		});
	});
	
	$('#sel_cargos').on('change',function(e){
		$('#sueldo_referencial').val($(this).find(':selected').data('sueldo'));
	});
	
	$('#btnBuscarPersona').on('click', function(e){
		/*Validación de campos*/
		if (!$('#num_identificacion').val())
		{	$("#modalBusquedaPersona").modal();
			return false;
		}
		else
		{	$('#num_identificacion').removeClass('parsley-error');
		}
		$('#id_persona').val("");
		$('#nombres_completos_persona').val("");
		$('#estado_persona').text("");
		$('#estado_persona').removeClass('label label-success');
		$('#estado_persona').removeClass('label label-danger');
		
		$.get('/ajax-buscarPersonaByID/'+$('#num_identificacion').val()+'/'+$('#document_type').val(), function (data){
			if (!data.id)
			{	Messenger().post("¡No existe registro!");
			}
			else
			{	$('#nombres_completos_persona').val(data.nombre_1+' '+data.nombre_2+' '+data.apellido_1+' '+data.apellido_2);
				$('#id_persona').val(data.id);
				$('#estado_persona').text(data.estado);
				if (data.estado=="ACTIVO")
				{	$('#estado_persona').addClass('label label-success');
					$('#GuardarContrato').prop('disabled',false);
				}
				else
				{	$('#estado_persona').addClass('label label-danger');
					$('#GuardarContrato').prop('disabled',true);
				}
			}
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