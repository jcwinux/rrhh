@extends('pages._templates.template_configuracion')
@section('content')
<div class="wrap">
	<div class="content container">
		<div class="row">
			<div class="col-sm-12">
                <section class="widget" id="tabla_departamentos">
					@include('pages.configuracion.tabla_departamento')
				</section>
			</div>
		</div>
	</div>
</div>
<!--Modales-->
<div id="modalDepartamento" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
								<label class="control-label" for="nombre_departamento">Nombre</label>
								<input type="text" id="nombre_departamento" name="nombre_departamento" class="form-control">
								<input type="hidden" id="departamento_id" name="departamento_id">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label" for="descripcion_departamento">Descripción</label>
								<textarea id="descripcion_departamento" name="descripcion_departamento" class="form-control"></textarea>
							</div>
						</div>
					</div>
				</fieldset>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="GuardarDepartamento" name="GuardarDepartamento">Guardar</button>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
@stop
@section('javascript_functions')
	 <script src="{{asset('js/functions/form_departamento.js')}}?{{$str_random[0]}}{{$str_random[1]}}{{$str_random[2]}}"></script> 
@stop