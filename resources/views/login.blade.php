@extends('pages._templates.template_base')
@section('content')
<div class="row" style="margin-top: 25px">
	<div class="alert alert-warning col-md-4 col-md-offset-4">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<strong><i class="fa fa-bell-o"></i> ¡Advertencia!</strong> {{ $mensaje_error or ""}}
	</div>
</div>
<div class="single-widget-container">
	<section class="widget login-widget">
		<header class="text-align-center">
			<h4>Inicio de sesión</h4>
		</header>
		<div class="body">
			<form class="no-margin"
				  action="modulos" method="post">
				<fieldset>
				{{ method_field('PATCH') }}
				{{ csrf_field() }}
					<div class="form-group">
						<label for="usuario" >Usuario</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-user"></i>
							</span>
							<input id="usuario" name="usuario" type="text" class="form-control input-lg" placeholder="Ingrese usuario">
						</div>
					</div>
					<div class="form-group">
						<label for="password" >Contraseña</label>
						<div class="input-group input-group-lg">
							<span class="input-group-addon">
								<i class="fa fa-lock"></i>
							</span>
							<input id="clave" name="clave" type="password" class="form-control input-lg" placeholder="Ingrese contraseña">
						</div>
					</div>
				</fieldset>
				<div class="form-actions">
					<button type="submit" class="btn btn-block btn-lg btn-danger">
						<span class="small-circle"><i class="fa fa-caret-right"></i></span>
						<small>Ingresar</small>
					</button>
					<a class="forgot" href="#">¿Olvidó su usuario o contraseña?</a>
				</div>
			</form>
		</div>
	</section>
</div>
@stop
@section('titulo')
	Login
@stop