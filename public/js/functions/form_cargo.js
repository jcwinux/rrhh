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
		data_post = 'cargo_id='+cargo_id+'&departamento_id='+departamento_id+'&nombre='+nombre+'&descripcion='+descripcion;
		$.ajax({
			type: "POST",
			url: "guardarCargo",
			data: data_post,
			success: function(data){
				var json_x = data;
				console.log(json_x);
				/*Limpia text*/
				$('#cargo_id').val('');
				$('#nombre').val('');
				$('#descripcion').val('');
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
{	$('#item_cat_descripcion').val('');
	$('#catalog_id').val('');
}
function cargarCargos(departamento)
{	if(!departamento)
		departamento=-1;
	$.get('/ajax-cargos/'+departamento, function (data){
		$('#tabla_cargos').html(data.html);
		$('#departamento_nuevo').val(departamento);
	});
}
function showCatalog(id)
{	$.get('/ajax-catalog_show/'+id, function (data){
		var json = $.parseJSON(data);
		$("#tipo_catalogo_nuevo").val(json.catalog_type_id);
		$('#item_cat_descripcion').val(json.descripcion);
		$('#catalog_id').val(json.id);
	});
}
function change_state(catalog_id,action)
{	data_post = 'catalog_id='+catalog_id+'&accion='+action;
		$.ajax({
			type: "POST",
			url: "cambiarEstado",
			data: data_post,
			success: function(data){
				var json_x = $.parseJSON(data);
				console.log(json_x);
				/*Recarga la tabla de catálogo*/
				cargarCatalogo($('#tipo_catalogo_nuevo option:selected').val());
				Messenger().post("El registro ha sido modificado exitosamente!");
			},
			error: function(data){
				Messenger().post("¡Ocurrió un error!");
			}
		});
}