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