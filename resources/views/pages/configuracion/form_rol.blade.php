@extends('pages._templates.template_configuracion')
@section('content')
<div class="wrap">
	<div class="content container">
		<div class="row">
			<div class="col-sm-12">
                <section class="widget" id="tabla_roles">
					@include('pages.configuracion.tabla_rol')
				</section>
			</div>
		</div>
	</div>
</div>
<!--Modales-->
<div id="modalRol" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
							<label class="control-label" for="empresa">Nombre</label>
							<input type="text" id="nombre_rol" name="nombre_rol" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label class="control-label" for="cargo">Descripción</label>
							<textarea id="descripcion_rol" name="descripcion_rol" class="form-control"></textarea>
							<input type="hidden" id="rol_id" name="rol_id" value="" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<h4>Módulos del sistema</h4>
							<ul class="news-list news-list-no-hover" id="list_modulos">
							@foreach ($modulos as $mod)
								<li>
									<img src="img/1.png" alt="" class="pull-left img-circle"/>
									<div class="news-item-info">
										<div class="name">{{$mod->nombre}}</div>
										<input id="mod_{{$mod->id}}" data-modulo_id="{{$mod->id}}" name="modulos" type="checkbox" class="pull-right" style="margin-right: 15px;margin-left: 15px"/>
										<div class="position">{{$mod->descripcion}}</div>
										<div class="time">Creación {{$mod->created_at}}</div>
									</div>
								</li>
							@endforeach
							</ul>
						</div>
					</div>
				</div>
			</fieldset>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="GuardarRol" name="GuardarRol">Guardar</button>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
@stop
@section('javascript_functions')
	 <script src="{{asset('js/functions/form_rol.js')}}?{{$str_random[0]}}{{$str_random[1]}}{{$str_random[2]}}"></script> 
@stop