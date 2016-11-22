$(document).ready(function(){
	$('#cambiarContraseña').on('click', function(e){
		/*Validación de campos*/
		if (!$('#clave_actual').val())
		{	$('#clave_actual').addClass('parsley-error');
			return false;
		}
		else
		{	$('#clave_actual').removeClass('parsley-error');
		}
		if (!$('#nueva_clave').val())
		{	$('#nueva_clave').addClass('parsley-error');
			return false;
		}
		else
		{	$('#nueva_clave').removeClass('parsley-error');
		}
		if (!$('#repita_clave').val())
		{	$('#repita_clave').addClass('parsley-error');
			return false;
		}
		else
		{	$('#repita_clave').removeClass('parsley-error');
		}
	});
});