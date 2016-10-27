$(document).ready(function(){
	/*Configurando ajax*/
	$(function () {
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});
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
				clean();
				cargarRoles();
			},
			error: function(data){
				Messenger().post("¡Ocurrió un error!");
			}
		});
	});
});
function clear()
{	$('#rol_id').val('');
	$('#nombre_rol').val('');
	$('#descripcion_rol').val('');
	$.each($("input[name='modulos']"), function(){
		$(this).attr('checked',false);
	});
}
function cargarRoles()
{	$.get('/ajax-roles/', function (data){
		$('#tabla_roles').html(data.html);
	});
}
function showRole(id)
{	$.get('/ajax-rol_show/'+id, function (data){
		var json = $.parseJSON(data);
		$("#rol_id").val(json.rol.id);
		$('#nombre_rol').val(json.rol.nombre);
		$('#descripcion_rol').val(json.rol.descripcion);
		$('#list_modulos').empty();
		$.each(json.modulos, function(key,value){
			li = '<img src="img/1.png" alt="" class="pull-left img-circle"/><div class="news-item-info"><div class="name">'+value.nombre+'</div><input id="mod_'+value.id+'" data-modulo_id="'+value.id+'" name="modulos" type="checkbox" class="pull-right" style="margin-right: 15px;margin-left: 15px" '+(value.estado=='ACTIVO'?'checked':'')+'/><div class="position">'+value.descripcion+'</div><div class="time">Creación '+value.created_at+'</div></div>';
			$('#list_modulos').append("<li>"+li+"</li>");
		});
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