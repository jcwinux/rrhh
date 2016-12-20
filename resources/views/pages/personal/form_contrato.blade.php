@extends('pages._templates.template_personal')
@section('content')
<div class="wrap">
	<div class="content container">
		<div class="row">
			<div class="col-sm-12">
                <section class="widget" id="tabla_centros_costos">
					@include('pages.personal.tabla_contrato')
				</section>
			</div>
		</div>
	</div>
</div>
<!--Modales-->
<div id="modalContrato" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header alert-primary">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel2">Formulario</h4>
			</div>
			<div class="modal-body">
				<fieldset>
					<div class="row">
						<div class="col-sm-2">
							<label class="control-label" for="nombre_centro_costo">Buscar persona</label>
						</div>
						<div class="col-sm-4">
							<div class="input-group">
								<input id="num_identificacion" class="form-control" required="required" type="text" name="num_identificacion" placeholder="Número identificación" maxlength="30">
								<span class="input-group-btn">
									<select id="document_type" class="selectpicker" data-style="btn-default" data-width="auto">
										@foreach ($tipo_doc as $t)
											<option value="{{$t->id}}">{{$t->descripcion}}</option>
										@endforeach
									</select>
								</span>
							</div>			
						</div>
						<div class="col-sm-3">						
							<button class="btn btn-primary" id="btnBuscarPersona" name="btnBuscarPersona"><span class="glyphicon glyphicon-search"></span> Buscar</button>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<legend class="section">Datos personales</legend>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-2">
							<label class="control-label" for="nombres_completos_persona">Nombres completos</label>
						</div>
						<div class="col-sm-4">
							<input class="form-control" id="nombres_completos_persona" name="nombres_completos_persona" disabled="disabled"/>
						</div>
						<div class="col-sm-2">
							<label class="control-label" for="id_persona">Código interno</label>
						</div>
						<div class="col-sm-2">
							<input class="form-control" id="id_persona" name="id_persona" disabled="disabled"/>
						</div>
						<div class="col-sm-2">
							<span id="estado_persona" name="estado_persona"></span>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<legend class="section">Datos institucionales</legend>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-2">
							<label class="control-label" for="nombre_centro_costo">Departamento</label>
						</div>
						<div class="col-sm-4">
							<select id="sel_departamentos" name="sel_departamentos" class="form-control">
								<option value=""></option>
								@foreach ($departamentos as $departamento)
								<option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-sm-2">
							<label class="control-label" for="sel_cargos">Cargo</label>
						</div>
						<div class="col-sm-4">
							<select id="sel_cargos" name="sel_cargos" class="form-control"></select>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-2">
							<label class="control-label" for="nombre_centro_costo">Tipo de contrato</label>
						</div>
						<div class="col-sm-4">
							<select  id="sel_tipos_contrato" name="sel_tipos_contrato" class="form-control">
								@foreach ($tipos_contrato as $tipo_contrato)
								<option value="{{$tipo_contrato->id}}">{{$tipo_contrato->nombre}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-sm-2">
							<label class="control-label" for="nombre_centro_costo">Ubicación</label>
						</div>
						<div class="col-sm-4">
							<select id="sel_ubicaciones" name="sel_ubicaciones" class="form-control">
								@foreach ($ubicaciones as $ubicacion)
								<option value="{{$ubicacion->id}}">{{$ubicacion->nombre}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-2">
							<label class="control-label" for="nombre_centro_costo">Tipo de empleado</label>
						</div>
						<div class="col-sm-4">
							<select class="form-control" disabled="disabled"></select>
						</div>
						<div class="col-sm-2">
							<label class="control-label" for="nombre_centro_costo">Forma pago</label>
						</div>
						<div class="col-sm-4">
							<select class="form-control">
								@foreach ($formas_pago as $forma_pago)
									<option value="{{$forma_pago->id}}">{{$forma_pago->descripcion}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-2">
							<label class="control-label" for="nombre_centro_costo">Es supervisor</label>
						</div>
						<div class="col-sm-4">
							<input type="checkbox" />
						</div>
						<div class="col-sm-2">
							<label class="control-label" for="nombre_centro_costo">Supervisado por</label>
						</div>
						<div class="col-sm-4">
							<select class="form-control" disabled="disabled"></select>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-2">
							<label class="control-label" for="nombre_centro_costo">Inicio contrato</label>
						</div>
						<div class="col-sm-4">
							<input id="fecha_ini_contrato" class="date-picker form-control" required="required" type="text" name="fecha_ini_contrato" value="" >
						</div>
						<div class="col-sm-2">
							<label class="control-label" for="nombre_centro_costo">Fin contrato</label>
						</div>
						<div class="col-sm-4">
							<input id="fecha_fin_contrato" class="date-picker form-control" required="required" type="text" name="fecha_fin_contrato" value="" >
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-2">
							<label class="control-label" for="sueldo_referencial">Sueldo ref. $</label>
						</div>
						<div class="col-sm-2">
							<input id="sueldo_referencial" class="form-control" required="required" type="text" name="sueldo_referencial" disabled="disabled" value="" >
						</div>
						<div class="col-sm-2 col-sm-offset-2">
							<label class="control-label" for="nombre_centro_costo">Sueldo $</label>
						</div>
						<div class="col-sm-2">
							<input id="fecha_ini_contrato" class="form-control" required="required" type="text" name="fecha_ini_contrato" value="" >
						</div>
					</div>
				</fieldset>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="GuardarContrato" name="GuardarContrato">Contratar</button>
				<button type="button" class="btn btn-primary" id="btnOpenModal" name="btnOpenModal">Open</button>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div id="modalBusquedaPersona" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header alert-primary">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel2">Búsqueda</h4>
			</div>
			<div class="modal-body">
				<!--Aquí va todo-->
				<div class="row">
					<div class="col-sm-10">
						<input id="num_identificacion" class="form-control" required="required" type="text" name="num_identificacion" placeholder="Escriba apellidos o ID" maxlength="30">
					</div>
					<div class="col-sm-2">						
						<button class="btn btn-primary" id="btnBuscarPersona" name="btnBuscarPersona"><span class="glyphicon glyphicon-search"></span></button>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<section class="widget" id="tabla_centros_costos">
							<table id="datatable-table" class="table table-striped table-hover" id="personas_" name="personas_">
								<thead>
									<tr>
										<th width="10%"></th>
										<th width="20%">Identificación</th>
										<th width="35%">Apellidos</th>
										<th width="35%">Nombre</th>
									</tr>
								</thead>
								<tbody id="personas_det">
									<tr>
										<td><input name="selec" type="radio"/></td>
										<td>0927148320</td>
										<td>Apellidos</td>
										<td>Nombre</td>
									</tr>
									<tr>
										<td><input name="selec" type="radio"/></td>
										<td>0927148320</td>
										<td>Apellidos</td>
										<td>Nombre</td>
									</tr>
									<tr>
										<td><input name="selec" type="radio"/></td>
										<td>0927148320</td>
										<td>Apellidos</td>
										<td>Nombre</td>
									</tr>
									<tr>
										<td><input name="selec" type="radio"/></td>
										<td>0927148320</td>
										<td>Apellidos</td>
										<td>Nombre</td>
									</tr>
								</tbody>
							</table>
						</section>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" id="GuardarContrato" name="GuardarContrato">Seleccionar</button>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
@stop
@section('javascript_functions')
	 <script src="{{asset('js/functions/form_contrato.js')}}?{{$str_random[0]}}{{$str_random[1]}}{{$str_random[2]}}"></script> 
@stop