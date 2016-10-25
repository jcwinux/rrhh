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
	
	$('#GuardarRol').on('click', function(e){
		/*Validación de campos*/
		if (!$('#nombre_rol').val())
		{	$('#nombre_rol').addClass('parsley-error');
			return false;
		}
		else
		{	$('#nombre_rol').removeClass('parsley-error');
		}
		if (!$('#descripcion_rol').val())
		{	$('#descripcion_rol').addClass('parsley-error');
			return false;
		}
		else
		{	$('#descripcion_rol').removeClass('parsley-error');
		}
		rol_id = $('#rol_id').val();
		nombre = $('#nombre_rol').val();
		descripcion = $('#descripcion_rol').val();
		
		json_rol = {};
		json_rol["rol_id"] = rol_id;
		json_rol["nombre"] = nombre;
		json_rol["descripcion"] = descripcion;
		
		json_modulos = [];
		$.each($("input[name='modulos']"), function(){
			item = {};
			item["modulo_id"] = $(this).attr('data-modulo_id');
			item["habilitado"] = $(this).is(':checked');
			json_modulos.push(item);
		});
		json_rol["modulos"] = json_modulos;
		
		$.ajax({
			type: "POST",
			url: "guardarRol",
			data: {data: JSON.stringify(json_rol)},
			success: function(data){
				var json_x = $.parseJSON(data);
				console.log(json_x);
				$('#rol_id').val(json_x.rol_id);
				Messenger().post("El registro ha sido grabado exitosamente!");
				cargarRoles();
			},
			error: function(data){
				Messenger().post("¡Ocurrió un error!");
			}
		});
	});
});
function clean()
{	$('#item_cat_descripcion').val('');
	$('#catalog_id').val('');
}
function cargarRoles()
{	$.get('/ajax-roles/', function (data){
		$('#tabla_roles').html(data.html);
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
function change_state(rol_id,action)
{	data_post = 'rol_id='+rol_id+'&accion='+action;
		$.ajax({
			type: "POST",
			url: "cambiarEstadoRol",
			data: data_post,
			success: function(data){
				var json_x = $.parseJSON(data);
				console.log(json_x);
				/*Recarga la tabla de catálogo*/
				cargarRoles();
				Messenger().post("El registro ha sido modificado exitosamente!");
			},
			error: function(data){
				Messenger().post("¡Ocurrió un error!");
			}
		});
}