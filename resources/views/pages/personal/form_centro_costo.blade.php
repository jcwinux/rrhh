@extends('pages._templates.template_personal')
@section('content')
<div class="wrap">
	<div class="content container">
		<div class="row">
			<div class="col-sm-12">
                <section class="widget" id="tabla_centros_costos">
					@include('pages.personal.tabla_centro_costo')
				</section>
			</div>
		</div>
	</div>
</div>
<!--Modales-->
<div id="modalCentrosCostos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
								<label class="control-label" for="nombre_centro_costo">Nombre</label>
								<input type="text" id="nombre_centro_costo" name="nombre_centro_costo" class="form-control">
								<input type="hidden" id="centro_costo_id" name="centro_costo_id">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label" for="descripcion_centro_costo">Descripción</label>
								<textarea id="descripcion_centro_costo" name="descripcion_centro_costo" class="form-control"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label" for="cuenta_contable_centro_costo">Cuenta contable</label>
								<input type="text" id="cuenta_contable_centro_costo" name="cuenta_contable_centro_costo" class="form-control">
							</div>
						</div>
					</div>
				</fieldset>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="GuardarCentroCosto" name="GuardarCentroCosto">Guardar</button>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
@stop
@section('javascript_functions')
	 <script src="{{asset('js/functions/form_centro_costo.js')}}?{{$str_random[0]}}{{$str_random[1]}}{{$str_random[2]}}"></script> 
@stop