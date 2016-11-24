@extends('pages._templates.template_personal')
@section('content')
<div class="wrap">
	<div class="content container">
		<div class="row">
			<div class="col-sm-12">
                <section class="widget">
					<fieldset>
						<legend class="section">Cargos</legend>
						<div class="form-group">
							<div class="cols-md-6">
								<label class="control-label col-sm-2" for="departamento">Departamento</label>
								<div class="col-sm-3">
									<select class="form-control" id="departamento" name="departamento">
										<option value=""></option>
										@foreach ($departamentos as $departamento)
										<option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<section class="widget" id="tabla_cargos">
									
								</section>
							</div>
						</div>
					</fieldset>
				</section>
			</div>
		</div>
	</div>
</div>
<!--Modales-->
<div id="modalCargos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
							<label class="control-label" for="departamento">Departamento</label>
							<select class="form-control" id="departamento_nuevo" name="departamento_nuevo" disabled="disabled">
								@foreach ($departamentos as $departamento)
								<option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label class="control-label" for="nombre">Nombre</label>
							<input type="text" id="nombre" name="nombre" class="form-control">
							<input type="hidden" id="cargo_id" name="cargo_id" value="" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label class="control-label" for="descripcion">Descripción</label>
							<textarea id="descripcion" name="descripcion" class="form-control"></textarea>
						</div>
					</div>
				</div>
			</fieldset>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="GuardarCargo" name="GuardarCargo">Agregar</button>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
@stop
@section('javascript_functions')
	 <script src="{{asset('js/functions/form_cargo.js')}}?{{$str_random[0]}}{{$str_random[1]}}{{$str_random[2]}}"></script> 
@stop