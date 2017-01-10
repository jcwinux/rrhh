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
	
	$("#btnBuscarPersonaGeneral").click(function(){
		$.get('/ajax-buscar_personas/'+$('#txt_buscar_persona').val(), function (data){
			$('#tabla_personas').html(data.html);
		});
	});
		
	$("#agregar_contrato").click(function(){
		clear();
		$('#num_identificacion').focus();
		$('#btnBuscarPersona').prop('disabled',false);
	});
		
	/*Llena los cargos que trabajan en un departamento*/
	$('#sel_departamentos').on('change',function(e){
		var department_id = e.target.value;
		if (!department_id)
			department_id = -1;
		cargarCargos(department_id,'');
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
		$('#estado_persona').removeClass('label label-warning');
		
		$.get('/ajax-buscarPersonaByID/'+$('#num_identificacion').val()+'/'+$('#document_type').val(), function (data){
			if (!data.id)
			{	Messenger().post("¡No existe registro!");
			}
			else
			{	$('#nombres_completos_persona').val(data.nombre_1+' '+data.nombre_2+' '+data.apellido_1+' '+data.apellido_2);
				$('#id_persona').val(data.id);
				$('#estado_persona').text(data.estado);
				switch (data.estado)
				{	case "ACTIVO":
						$('#estado_persona').addClass('label label-success');
						$('#GuardarContrato').prop('disabled',false);
					break;
					case "CONTRATADO":
						$('#estado_persona').addClass('label label-warning');
						$('#GuardarContrato').prop('disabled',true);
					break;
					case "INACTIVO":
						$('#estado_persona').addClass('label label-danger');
						$('#GuardarContrato').prop('disabled',true);
					break;
				}
			}
		});
	});
	$('#GuardarContrato').on('click', function(e){
		/*Validación de campos*/
		if (!$('#id_persona').val())
		{	$('#num_identificacion').addClass('parsley-error');
			return false;
		}
		if (!$('#sel_departamentos').val())
		{	$('#sel_departamentos').addClass('parsley-error');
			return false;
		}
		else
		{	$('#sel_departamentos').removeClass('parsley-error');
		}
		if (!$('#sel_cargos').val())
		{	$('#sel_cargos').addClass('parsley-error');
			return false;
		}
		else
		{	$('#sel_cargos').removeClass('parsley-error');
		}
		if (!$('#sel_tipos_contrato').val())
		{	$('#sel_tipos_contrato').addClass('parsley-error');
			return false;
		}
		else
		{	$('#sel_tipos_contrato').removeClass('parsley-error');
		}
		if (!$('#sel_ubicaciones').val())
		{	$('#sel_ubicaciones').addClass('parsley-error');
			return false;
		}
		else
		{	$('#sel_ubicaciones').removeClass('parsley-error');
		}
		if ($('#sel_supervisor').val()==$('#id_persona').val())
		{	$('#sel_supervisor').addClass('parsley-error');
			return false;
		}
		else
		{	$('#sel_supervisor').removeClass('parsley-error');
		}
		if (!$('#fecha_ini_contrato').val())
		{	$('#fecha_ini_contrato').addClass('parsley-error');
			return false;
		}
		else
		{	$('#fecha_ini_contrato').removeClass('parsley-error');
		}
		if (!$('#fecha_fin_contrato').val())
		{	$('#fecha_fin_contrato').addClass('parsley-error');
			return false;
		}
		else
		{	$('#fecha_fin_contrato').removeClass('parsley-error');
		}
		if (!$('#sueldo').val() || !$.isNumeric($('#sueldo').val()))
		{	$('#sueldo').addClass('parsley-error');
			return false;
		}
		else
		{	$('#sueldo').removeClass('parsley-error');
		}
		if ($('#fecha_fin_contrato').val()<=$('#fecha_ini_contrato').val())
		{	$('#fecha_fin_contrato').addClass('parsley-error');
			return false;
		}
		else
		{	$('#fecha_fin_contrato').removeClass('parsley-error');
		}
		$('#GuardarContrato').prop('disabled',true);
		json_contrato = {};
		json_contrato["contrato_id"] = $('#id_contrato').val();
		json_contrato["persona_id"] = $('#id_persona').val();
		json_contrato["departamento_id"] = $('#sel_departamentos').val();
		json_contrato["cargo_id"] = $('#sel_cargos').val();
		json_contrato["tipo_contrato_id"] = $('#sel_tipos_contrato').val();
		json_contrato["forma_pago"] = $('#sel_forma_pago').val();
		json_contrato["tipo_empleado"] = $('#sel_tipo_empleado').val();
		json_contrato["es_supervisor"] = $('#chk_es_supervisor').is(':checked');
		json_contrato["supervisado_por"] = $('#sel_supervisor').val();
		json_contrato["inicio_contrato"] = $('#fecha_ini_contrato').val();
		json_contrato["fin_contrato"] = $('#fecha_fin_contrato').val();
		json_contrato["sueldo"] = $('#sueldo').val();
		
		$.ajax({
			type: "POST",
			url: "guardarContrato",
			data: {data: JSON.stringify(json_contrato)},
			success: function(data){
				$('#id_contrato').val(data.contract_id);
				Messenger().post("El registro ha sido grabado exitosamente!");
				cargarContratos();
				$('#GuardarContrato').prop('disabled',false);
			},
			error: function(data){
				Messenger().post("¡Ocurrió un error!");
			}
		});
	});
});
function cargarTiposContrato()
{	$.get('/ajax-tipos_contrato/', function (data){
		$('#tabla_tipos_contrato').html(data.html);
	});
}
function cargarCargos(department_id,selected_job)
{	$.get('/ajax-cargos_departamento/'+department_id, function (data){
		$('#sel_cargos').empty();
		$('#sueldo_referencial').val('');
		$('#sel_cargos').append('<option value=""></option');
		$.each(data, function (index, cargosObj){
			$('#sel_cargos').append('<option value="'+cargosObj.id+'" data-sueldo="'+cargosObj.sueldo_referencial+'">'+cargosObj.codigo_sectorial+': '+cargosObj.nombre+'</option>');
		});
		$('#sel_cargos').val(selected_job);
		$('#sel_cargos option[value="'+selected_job+'"]').val(selected_job).attr('selected','selected');
		$('#sueldo_referencial').val($('#sel_cargos').find(':selected').data('sueldo'));
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
function cargarContratos()
{	$.get('/ajax-contratos/', function (data){
		$('#tabla_contratos').html(data.html);
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
function clear()
{	$('#num_identificacion').val('');
	$('#document_type').val($('#document_type option:first').val());
	$('#nombres_completos_persona').val('');
	$('#id_persona').val('');
	$('#id_contrato').val('');
	$('#estado_persona').text('');
	$('#sel_departamentos').val($('#sel_departamentos option:first').val());
	$('#sel_cargos').val($('#sel_cargos option:first').val());
	$('#sel_tipos_contrato').val($('#sel_tipos_contrato option:first').val());
	$('#sel_ubicaciones').val($('#sel_ubicaciones option:first').val());
	$('#sel_forma_pago').val($('#sel_forma_pago option:first').val());
	$('#sel_supervisor').val($('#sel_supervisor option:first').val());
	$('#chk_es_supervisor').attr('checked',false);
	$('#fecha_ini_contrato').val('');
	$('#fecha_fin_contrato').val('');
	$('#sueldo_referencial').val('');
	$('#sueldo').val('');
}
function showContrato (id)
{	$('#btnBuscarPersona').prop('disabled',true);
	$('#id_contrato').val(id);
	$.get('/ajax-contrato/'+id, function (data){
		var json = data;
		$('#id_persona').val(json.person_id);
		$('#nombres_completos_persona').val(json.apellido_1+' '+json.apellido_2+' '+json.nombre_1+' '+json.nombre_2);
		$('#sel_departamentos').val(json.department_id);
		$('#sel_forma_pago').val(json.forma_pago_id);
		$('#sel_tipo_empleado').val(json.employee_type_id);
		$('#sel_supervisor').val(json.supervisor_id);
		$('#fecha_ini_contrato').val(json.inicio_contrato);
		$('#fecha_fin_contrato').val(json.fin_contrato);
		$('#sueldo').val(json.salario);
		$('#estado_persona').text("");
		$('#estado_persona').removeClass('label label-success');
		$('#estado_persona').removeClass('label label-danger');
		$('#estado_persona').removeClass('label label-warning');
		cargarCargos(json.department_id,json.job_id);
		if (json.es_supervisor){
			$('#chk_es_supervisor').prop('checked',true);
		}
		else{
			$('#chk_es_supervisor').prop('checked',false);
		}
	});
}