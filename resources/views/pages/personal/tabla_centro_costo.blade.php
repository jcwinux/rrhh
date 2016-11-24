<!--Hay que poner los js cuando son cargados por medio de ajax-->
<script src="{{asset('lib/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/tables-dynamic.js')}}"></script>
<fieldset>
	<legend class="section">
		Centros de costos
		<button id="agregar_centro_costo" name="agregar_centro_costo" type="button" class="btn btn-transparent btn-xs pull-right" data-toggle="modal" data-target="#modalCentrosCostos" data-backdrop="static">
			<i class="fa fa-plus"></i>
			Añadir
		</button>
	</legend>
	<table id="datatable-table" class="table table-striped table-hover" id="centros_costos_agregados" name="centros_costos_agregados">
	<thead>
		<tr>
			<th width="5%">ID</th>
			<th width="25%">Nombre</th>
			<th width="25%">Descripción</th>
			<th width="15%">Cuenta asociada</th>
			<th width="10%">Estado</th>
			<th width="10%">Opciones</th>
		</tr>
	</thead>
	<tbody id="det_centro_costo">
	@foreach ($centros_costos as $centro_costo)
	<tr>
		<td>{{$centro_costo->id}}</td>
		<td>{{$centro_costo->nombre}}</td>
		<td>{{$centro_costo->descripcion}}</td>
		<td>{{$centro_costo->cuenta_contable}}</td>
		<td>
			@if ($centro_costo->estado=="ACTIVO")
				<span class="label label-success">{{$centro_costo->estado}}</span>
			@else
				<span class="label label-default">{{$centro_costo->estado}}</span>
			@endif
		</td>
		<td class="text-align-center">
			@if ($centro_costo->estado=="ACTIVO")
				<button type="button" title="Inactivar" onclick="change_state({{$centro_costo->id}},'INACTIVAR')" class="btn btn-transparent btn-xs pull-right">
					<i class="fa fa-times"></i>
				</button>
				<button type="button" title="Modificar" onclick="showCentroCosto({{$centro_costo->id}})" class="btn btn-transparent btn-xs pull-right editar_cat" data-toggle="modal" data-target="#modalCentrosCostos" data-backdrop="static">
					<i class="fa fa-pencil"></i>
				</button>
			@else
				<button type="button" title="Activar" onclick="change_state({{$centro_costo->id}},'ACTIVAR')" class="btn btn-transparent btn-xs pull-right">
					<i class="fa fa-check"></i>
				</button>
			@endif
		</td>
	</tr>
	@endforeach
	</tbody>
	</table>
</fieldset>