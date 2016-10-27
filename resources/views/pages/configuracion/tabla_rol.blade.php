<!--Hay que poner los js cuando son cargados por medio de ajax-->
<script src="{{asset('lib/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/tables-dynamic.js')}}"></script>
<fieldset>
	<legend class="section">
		Ítems
		<button id="agregar_rol" name="agregar_rol" onclick="clean()" type="button" class="btn btn-transparent btn-xs pull-right" data-toggle="modal" data-target="#modalRol" data-backdrop="static">
			<i class="fa fa-plus"></i>
			Añadir
		</button>
	</legend>
	<table id="datatable-table" class="table table-striped table-hover" id="roles_agregados" name="roles_agregados">
	<thead>
		<tr>
			<th width="10%">ID</th>
			<th width="20%">Nombre</th>
			<th width="50%">Descripción</th>
			<th width="10%">Estado</th>
			<th width="10%">Opciones</th>
		</tr>
	</thead>
	<tbody id="det_item_catalogo">
		@foreach ($roles as $rol)
		<tr>
			<td>{{$rol->id}}</td>
			<td>{{$rol->nombre}}</td>
			<td>{{$rol->descripcion}}</td>
			<td>
			@if ($rol->estado=="ACTIVO")
				<span class="label label-success">{{$rol->estado}}</span>
			@else
				<span class="label label-default">{{$rol->estado}}</span>
			@endif
		</td>
			<td class="text-align-center">
			@if ($rol->estado=="ACTIVO")
				<button type="button" title="Inactivar" onclick="change_state({{$rol->id}},'INACTIVAR')" class="btn btn-transparent btn-xs pull-right">
					<i class="fa fa-times"></i>
				</button>
				<button type="button" title="Modificar" onclick="showRole({{$rol->id}})" class="btn btn-transparent btn-xs pull-right editar_cat" data-toggle="modal" data-target="#modalRol" data-backdrop="static">
				<i class="fa fa-pencil"></i>
			</button>
			@else
				<button type="button" title="Activar" onclick="change_state({{$rol->id}},'ACTIVAR')" class="btn btn-transparent btn-xs pull-right">
					<i class="fa fa-check"></i>
				</button>
			@endif
		</td>
		</tr>
		@endforeach
	</tbody>
	</table>
</fieldset>