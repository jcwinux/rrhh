$(document).ready(function(){
	/*Configurando ajax*/
	$(function () {
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});
	});
	/*Llena los módulos asignados a un rol*/
	$('#rol').on('change',function(e){
		$('#tabla_formularios').empty();
		var rol_id = e.target.value;
		if (!rol_id)
			rol_id = -1;
		$.get('/ajax-modulos_asignados/'+rol_id, function (data){
			$('#modulos_asignados').empty();
			$('#modulos_asignados').append('<option value=""></option');
			$.each(data, function (index, modulosObj){
				$('#modulos_asignados').append('<option value="'+modulosObj.id+'">'+modulosObj.nombre+'</option>');
			});
		});
	});
	/*Carga tabla con los formularios que pertenecen al módulo seleccionado*/
	$('#modulos_asignados').on('change', function(e){
		var module_id = e.target.value;
		if (!module_id)
			module_id = -1;
		cargarFormularios(module_id);
	});
});
/*Carga en una tabla los formularios de un módulo en específico*/
function cargarFormularios(module_id)
{	if(!module_id)
		module_id=-1;
	$.get('/ajax-forms_por_modulo/'+module_id, function (data){
		$('#tabla_formularios').html(data.html);
	});
}
function showFormFunctions(id)
{	$.get('/ajax-form_functions/'+id, function (data){
		$('#tbl_funciones tbody').empty();
		$.each(data, function(key,value){
			checked = (value.estado=='ACTIVO'?'checked':'');
			tr = '<tr><td class="text-align-center" width="10%"><input type="checkbox" class="mylink" data-id="'+value.id+'" data-formulario="'+id+'" '+checked+'/></td><td width="90%">'+value.nombre+'</td></tr>';
			$('#tbl_funciones tbody').append(tr);
		});
	});
}
$(function() {
    $(document).on('change', '.mylink', function() {
		id = $(this).attr('data-id');
        estado = $(this).prop('checked');
		formulario = $(this).attr('data-formulario');
	   $.get('/ajax-cambiarEstadoPermiso/'+id+'/'+estado+'/'+formulario, function (data){
		   showFormFunctions(formulario);
		   cargarFormularios($('#modulos_asignados :selected').val());
		});
    });
});