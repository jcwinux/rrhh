$(document).ready(function(){
	/*Configurando ajax*/
	$(function () {
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});
	});
	
	$('#tipo_catalogo').on('change', function(e){
		var tipo_cat = e.target.value;
		if (!tipo_cat)
			tipo_cat = -1;
		cargarCatalogo(tipo_cat);
	});
	
	$('#GuardarItemCatalogo').on('click', function(e){
		/*Validación de campos*/
		if (!$('#item_cat_descripcion').val())
		{	$('#item_cat_descripcion').addClass('parsley-error');
			return false;
		}
		else
		{	$('#item_cat_descripcion').removeClass('parsley-error');
		}
		catalog_id = $('#catalog_id').val();
		descripcion = $('#item_cat_descripcion').val();
		catalog_type_id = $('#tipo_catalogo_nuevo option:selected').val();
		data_post = 'catalog_id='+catalog_id+'&catalog_type_id='+catalog_type_id+'&descripcion='+descripcion;
		$.ajax({
			type: "POST",
			url: "guardarItemCatalogo",
			data: data_post,
			success: function(data){
				var json_x = $.parseJSON(data);
				console.log(json_x);
				/*Limpia text*/
				$('#catalog_id').val('');
				$('#item_cat_descripcion').val('');
				/*Recarga la tabla de catálogo*/
				cargarCatalogo(catalog_type_id);
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
function cargarCatalogo(tipo_cat)
{	if(!tipo_cat)
		tipo_cat=-1;
	$.get('/ajax-catalogo_por_tipo/'+tipo_cat, function (data){
		$('#tabla_items_cat').html(data.html);
		$('#tipo_catalogo_nuevo').val(tipo_cat);
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