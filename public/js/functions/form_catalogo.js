$(document).ready(function(){
	/*Configurando ajax*/
	$('#del_item_cat').on('click',function(){
			alert ("CLICK");
	});
	
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
	
	$('#AgregarItemCatalogo').on('click', function(e){
		/*Validación de campos*/
		if (!$('#item_cat_descripcion').val())
		{	$('#item_cat_descripcion').addClass('parsley-error');
			return false;
		}
		else
		{	$('#item_cat_descripcion').removeClass('parsley-error');
		}
		descripcion = $('#item_cat_descripcion').val();
		catalog_type_id = $('#tipo_catalogo_nuevo option:selected').val();
		data_post = 'catalog_type_id='+catalog_type_id+'&descripcion='+descripcion;
		$.ajax({
			type: "POST",
			url: "crearItemCatalogo",
			data: data_post,
			success: function(data){
				var json_x = $.parseJSON(data);
				console.log(json_x);
				/*Limpia text*/
				$('#item_cat_descripcion').val("");
				/*Recarga la tabla de catálogo*/
				cargarCatalogo(catalog_type_id);
				Messenger().post("El registro ha sido grabado exitosamente!");
			},
			error: function(data){
				Messenger().post("¡Ocurrió un error!");
			}
		});
	});
	function cargarCatalogo(tipo_cat)
	{	if(!tipo_cat)
			tipo_cat=-1;
		$.get('/ajax-catalogo_por_tipo/'+tipo_cat, function (data){
			$('#tabla_items_cat').html(data.html);
			$('#tipo_catalogo_nuevo').val(tipo_cat);
		});
	}
});