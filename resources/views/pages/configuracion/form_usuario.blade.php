@extends('pages._templates.template_configuracion')
@section('content')
<div class="wrap">
	<div class="content container">
		<div class="row">
			<div class="col-sm-12">
                <section class="widget" id="tabla_usuarios">
					@include('pages.configuracion.tabla_usuario')
				</section>
			</div>
		</div>
	</div>
</div>
<!--Modales-->
<div id="modalUsuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel2">Formulario</h4>
			</div>
			<div class="modal-body">
				<fieldset>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label class="control-label" for="nombre_usuario">Nombres</label>
							<input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control">
							<input type="hidden" id="user_id" name="user_id">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label class="control-label" for="apellido_usuario">Apellidos</label>
							<input type="text" id="apellido_usuario" name="apellido_usuario" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label class="control-label" for="correo_usuario">Correo</label>
							<input type="text" id="correo_usuario" name="correo_usuario" class="form-control">
							<ul id="correo_check_info" class="parsley-errors-list filled">
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label class="control-label" for="username_usuario">Usuario</label>
							<input type="text" id="username_usuario" name="username_usuario" class="form-control">
							<ul id="username_check_info" class="parsley-errors-list filled">
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label class="control-label" for="empresa">Rol</label>
							<select id="sel_roles" name="sel_roles" class="form-control">
							@foreach ($roles as $rol)
								<option value="{{$rol->id}}">{{$rol->nombre}}</option>
							@endforeach
							</select>
						</div>
					</div>
				</div>
			</fieldset>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="GuardarUsuario" name="GuardarUsuario">Guardar</button>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
@stop
@section('javascript_functions')
	 <script src="{{asset('js/functions/form_usuario.js')}}?{{$str_random[0]}}{{$str_random[1]}}{{$str_random[2]}}"></script> 
@stop