<!--Hay que poner los js cuando son cargados por medio de ajax-->
<script src="{{asset('lib/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/tables-dynamic.js')}}"></script>
<fieldset>
	<legend class="section">
		Tipos de contrato
	</legend>
	<table id="datatable-table" class="table table-striped table-hover" id="tipos_contrato_agregados" name="tipos_contrato_agregados">
	<thead>
		<tr>
			<th width="5%">ID</th>
			<th width="25%">Nombre</th>
			<th width="50%">Descripción</th>
			<th width="10%">Estado</th>
			<th width="10%">Opciones</th>
		</tr>
	</thead>
	<tbody id="det_tipo_contrato">
	@foreach ($tipos_contrato as $tipo_contrato)
	<tr>
		<td>{{$tipo_contrato->id}}</td>
		<td>{{$tipo_contrato->nombre}}</td>
		<td>{{$tipo_contrato->descripcion}}</td>
		<td>
			@if ($tipo_contrato->estado=="ACTIVO")
				<span class="label label-success">{{$tipo_contrato->estado}}</span>
			@else
				<span class="label label-default">{{$tipo_contrato->estado}}</span>
			@endif
		</td>
		<td class="text-align-center">
			@if ($tipo_contrato->estado=="ACTIVO")
				<button type="button" title="Inactivar" onclick="change_state({{$tipo_contrato->id}},'INACTIVAR')" class="btn btn-transparent btn-xs pull-right">
					<i class="fa fa-times"></i>
				</button>
				<button type="button" title="Modificar" onclick="showTipoContrato({{$tipo_contrato->id}})" class="btn btn-transparent btn-xs pull-right editar_cat" data-toggle="modal" data-target="#modalTipoContrato" data-backdrop="static">
					<i class="fa fa-pencil"></i>
				</button>
			@else
				<button type="button" title="Activar" onclick="change_state({{$tipo_contrato->id}},'ACTIVAR')" class="btn btn-transparent btn-xs pull-right">
					<i class="fa fa-check"></i>
				</button>
			@endif
		</td>
	</tr>
	@endforeach
	</tbody>
	</table>
</fieldset>