@extends('pages._templates.template_configuracion')
@section('content')
<div class="wrap">
	<div class="content container">
		<form method="POST" action="/cambiarClave/cambiar">
		 {{ csrf_field() }}
			<section class="widget">
				<fieldset>
					<legend class="section">Cambiar contraseña </legend>
					<div class="form-group">
						<div class="row">
							<div class="cols-md-6">
								<label class="control-label col-sm-2" for="tipo_catalogo">Contraseña actual</label>
								<div class="col-sm-3">
									<input type="password" id="clave_actual" name="clave_actual" class="form-control"/>
								</div>
							</div>
						</div>
					</div>
					<legend class="section"></legend>
					<div class="form-group">
						<div class="row">
							<div class="cols-md-6">
								<label class="control-label col-sm-2" for="tipo_catalogo">Nueva contraseña</label>
								<div class="col-sm-3">
									<input type="password" id="nueva_clave" name="nueva_clave" class="form-control"/>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="cols-md-6">
								<label class="control-label col-sm-2" for="tipo_catalogo">Repita contraseña</label>
								<div class="col-sm-3">
									<input type="password" id="repita_clave" name="repita_clave" class="form-control"/>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="cols-md-6">
								<div class="col-sm-3 col-sm-offset-2">
									<input id="cambiarContraseña" name="cambiarContraseña" type="submit" class="btn btn-primary" value="Guardar cambios"/>
								</div>
							</div>
						</div>
					</div>
				</fieldset>
				<span class="label label-{{ (session('result')=='error'?'danger':'success') }}">{{ session('message') }}</span>
			</section>
		</form>
	</div>
</div>
@stop
@section('javascript_functions')
	 <script src="{{asset('js/functions/form_cambiar_contraseña.js')}}"></script> 
@stop