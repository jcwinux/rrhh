@extends('pages._templates.template_configuracion')
@section('content')
<div class="wrap">
	<div class="content container">
		<div class="row">
			<div class="col-sm-12">
                <section class="widget">
					<fieldset>
						<legend class="section">Permisos</legend>
						<div class="form-group">
							<div class="cols-md-6">
								<label class="control-label col-sm-2" for="correo_electronico">Rol</label>
								<div class="col-sm-3">
									<select class="form-control" id="rol" name="rol">
										<option value=""></option>
										@foreach ($roles as $rol)
										<option value="{{$rol->id}}">{{$rol->nombre}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="cols-md-6">
								<label class="control-label col-sm-2" for="modulos">Módulos asignados</label>
								<div class="col-sm-3">
									<select class="form-control" id="modulos_asignados" name="modulos_asignados">
									</select>
								</div>
							</div>
						</div>
					</fieldset>
				</section>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
                <section class="widget" id="tabla_formularios">
					
				</section>
			</div>
		</div>
	</div>
</div>
<!--Modales-->
<div id="modalFunciones" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
						<table id="tbl_funciones" class="table table-hover table-bordered">
						<tbody>
							<tr>
								<td class="text-align-center" width="10%"><input type="checkbox"/></td>
								<td width="90%">Guardar</td>
							</tr>
						</tbody>
						</table>
						</div>
					</div>
				</div>
			</fieldset>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="GuardarItemCatalogo" name="GuardarItemCatalogo">Agregar</button>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
@stop
@section('javascript_functions')
	 <script src="{{asset('js/functions/form_permisos.js')}}?{{$str_random[0]}}{{$str_random[1]}}{{$str_random[2]}}"></script> 
@stop