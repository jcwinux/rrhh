@extends('pages._templates.template_base')
@section('content')

@if (Session::has('fail_message'))
<div class="row" style="margin-top: 25px">
	<div class="alert alert-danger col-md-4 col-md-offset-4">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="fa fa-ban"></i> <strong>Error de autenticación</strong></h4>
		<p>{{ Session::get('fail_message') }}</p>
	</div>
</div>
@endif
@if (Session::has('bye_message'))
<div class="row" style="margin-top: 25px">
	<div class="alert alert-success col-md-4 col-md-offset-4">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<h4><i class="fa fa-check"></i> <strong>¡Perfecto!</strong></h4>
		<p>{{ Session::get('bye_message') }}</p>
	</div>
</div>
@endif
@if (count($errors))
<div class="row" style="margin-top: 25px">
	<div class="alert alert-warning col-md-4 col-md-offset-4">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<strong><i class="fa fa-bell-o"></i> ¡Advertencia!</strong>
		<ul class="text-list">
			@foreach ($errors->all() as $error)
				<li> {{ $error }} </li>
			@endforeach
		</ul>
	</div>
</div>
@endif

<div class="single-widget-container">
	<section class="widget login-widget">
		<header class="text-align-center">
			<h4>Inicio de sesión</h4>
		</header>
		<div class="body">
			<form class="no-margin"
				  action="authenticate" method="post">
				<fieldset>
				{{ method_field('PATCH') }}
				{{ csrf_field() }}
					<div class="form-group">
						<label for="usuario" >Usuario</label>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-user"></i>
							</span>
							<input id="usuario" name="usuario" type="text" class="form-control input-lg" placeholder="Ingrese usuario" value="{{ old('usuario') }}">
						</div>
					</div>
					<div class="form-group">
						<label for="password" >Contraseña</label>
						<div class="input-group input-group-lg">
							<span class="input-group-addon">
								<i class="fa fa-lock"></i>
							</span>
							<input id="clave" name="clave" type="password" class="form-control input-lg" placeholder="Ingrese contraseña" value="{{ old('clave') }}">
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