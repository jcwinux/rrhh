$(document).ready(function(){
	/*Configurando ajax*/
	$(function () {
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});
	});
	$('#agregar_usuario').on('click', function(e){
		$('#user_id').val('');
		$('#nombre_usuario').val('');
		$('#correo_usuario').val('');
		$('#apellido_usuario').val('');
		$('#username_usuario').val('');
		$("#sel_roles option:first");
	});
	$('#GuardarRol').on('click', function(e){
		/*Validación de campos*/
		if (!$('#nombre_usuario').val())
		{	$('#nombre_usuario').addClass('parsley-error');
			return false;
		}
		else
		{	$('#nombre_usuario').removeClass('parsley-error');
		}
		if (!$('#apellido_usuario').val())
		{	$('#apellido_usuario').addClass('parsley-error');
			return false;
		}
		else
		{	$('#apellido_usuario').removeClass('parsley-error');
		}
		if (!$('#correo_usuario').val())
		{	$('#correo_usuario').addClass('parsley-error');
			return false;
		}
		else
		{	$('#correo_usuario').removeClass('parsley-error');
		}
		if (!$('#username_usuario').val())
		{	$('#username_usuario').addClass('parsley-error');
			return false;
		}
		else
		{	$('#username_usuario').removeClass('parsley-error');
		}
		user_id = $('#user_id').val();
		nombre = $('#nombre_usuario').val();
		apellido = $('#apellido_usuario').val();
		correo = $('#correo_usuario').val();
		username = $('#username_usuario').val();
		role_id = $('#sel_roles :selected').val();
		
		json_rol = {};
		json_rol["user_id"] = user_id;
		json_rol["nombre"] = nombre;
		json_rol["apellido"] = apellido;
		json_rol["correo"] = correo;
		json_rol["username"] = username;
		json_rol["role_id"] = role_id;
		
		$.ajax({
			type: "POST",
			url: "guardarUsuario",
			data: {data: JSON.stringify(json_rol)},
			success: function(data){
				$('#user_id').val(data.user_id);
				Messenger().post("El registro ha sido grabado exitosamente!");
				cargarUsuarios();
			},
			error: function(data){
				Messenger().post("¡Ocurrió un error!");
			}
		});
	});
});
function cargarUsuarios()
{	$.get('/ajax-usuarios/', function (data){
		$('#tabla_usuarios').html(data.html);
	});
}
function showUser(id)
{	$.get('/ajax-usuario_show/'+id, function (data){
		var json = data;
		$('#nombre_usuario').val(json.nombre);
		$('#apellido_usuario').val(json.apellido);
		$('#correo_usuario').val(json.correo);
		$('#sel_roles').val(json.role_id);
		$('#username_usuario').val(json.username);
		$('#user_id').val(id);
	});
}
$('#username_usuario').on('keyup', function(e){
	$.get('/ajax-validate_username/', function (data){
		
	});
});
function change_state(user_id,action)
{	data_post = 'user_id='+user_id+'&accion='+action;
	$.ajax({
		type: "POST",
		url: "cambiarEstadoUsuario",
		data: data_post,
		success: function(data){
			var json_x = data;
			/*Recarga la tabla de catálogo*/
			cargarUsuarios();
			Messenger().post("El registro ha sido modificado exitosamente!");
		},
		error: function(data){
			Messenger().post("¡Ocurrió un error!");
		}
	});
}