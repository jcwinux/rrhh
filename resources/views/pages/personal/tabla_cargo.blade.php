<!--Hay que poner los js cuando son cargados por medio de ajax-->
<script src="{{asset('lib/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/tables-dynamic.js')}}"></script>
<fieldset>
	<legend class="section">
		Cargos
		<button id="agregar_cargo" name="agregar_cargo" onclick="clear()" type="button" class="btn btn-transparent btn-xs pull-right" data-toggle="modal" data-target="#modalCargos" data-backdrop="static">
			<i class="fa fa-plus"></i>
			Añadir
		</button>
	</legend>
	<table id="datatable-table" class="table table-striped table-hover" id="cargos_agregados" name="cargos_agregados">
	<thead>
		<tr>
			<th width="10%">ID</th>
			<th width="30%">Cargo</th>
			<th width="40%">Descripción</th>
			<th width="10%">Estado</th>
			<th width="10%">Opciones</th>
		</tr>
	</thead>
	<tbody id="det_item_catalogo">
	@foreach ($cargos as $cargo)
	<tr>
		<td>{{$cargo->id}}</td>
		<td>{{$cargo->nombre}}</td>
		<td>{{$cargo->descripcion}}</td>
		<td>
			@if ($cargo->estado=="ACTIVO")
				<span class="label label-success">{{$cargo->estado}}</span>
			@else
				<span class="label label-default">{{$cargo->estado}}</span>
			@endif
		</td>
		<td class="text-align-center">
			@if ($cargo->estado=="ACTIVO")
				<button type="button" title="Inactivar" onclick="change_state({{$cargo->id}},'INACTIVAR')" class="btn btn-transparent btn-xs pull-right">
					<i class="fa fa-times"></i>
				</button>
				<button type="button" title="Modificar" onclick="showCatalog({{$cargo->id}})" class="btn btn-transparent btn-xs pull-right editar_cat" data-toggle="modal" data-target="#modalCargos" data-backdrop="static">
				<i class="fa fa-pencil"></i>
			</button>
			@else
				<button type="button" title="Activar" onclick="change_state({{$cargo->id}},'ACTIVAR')" class="btn btn-transparent btn-xs pull-right">
					<i class="fa fa-check"></i>
				</button>
			@endif
		</td>
	</tr>
	@endforeach
	</tbody>
	</table>
</fieldset>