<!--Hay que poner los js cuando son cargados por medio de ajax-->
<script src="{{asset('lib/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/tables-dynamic.js')}}"></script>
<fieldset>
	<legend class="section">
		Ubicaciones
		<button id="agregar_ubicacion" name="agregar_ubicacion" type="button" class="btn btn-transparent btn-xs pull-right" data-toggle="modal" data-target="#modalUbicacion" data-backdrop="static">
			<i class="fa fa-plus"></i>
			Añadir
		</button>
	</legend>
	<table id="datatable-table" class="table table-striped table-hover" id="ubicaciones_agregadas" name="ubicaciones_agregadas">
	<thead>
		<tr>
			<th width="5%">ID</th>
			<th width="35%">Nombre</th>
			<th width="40%">Descripción</th>
			<th width="10%">Estado</th>
			<th width="10%">Opciones</th>
		</tr>
	</thead>
	<tbody id="det_ubicaciones">
	@foreach ($ubicaciones as $ubicacion)
	<tr>
		<td>{{$ubicacion->id}}</td>
		<td>{{$ubicacion->nombre}}</td>
		<td>{{$ubicacion->descripcion}}</td>
		<td>
			@if ($ubicacion->estado=="ACTIVO")
				<span class="label label-success">{{$ubicacion->estado}}</span>
			@else
				<span class="label label-default">{{$ubicacion->estado}}</span>
			@endif
		</td>
		<td class="text-align-center">
			@if ($ubicacion->estado=="ACTIVO")
				<button type="button" title="Inactivar" onclick="change_state({{$ubicacion->id}},'INACTIVAR')" class="btn btn-transparent btn-xs pull-right">
					<i class="fa fa-times"></i>
				</button>
				<button type="button" title="Modificar" onclick="showUbicacion({{$ubicacion->id}})" class="btn btn-transparent btn-xs pull-right editar_cat" data-toggle="modal" data-target="#modalUbicacion" data-backdrop="static">
					<i class="fa fa-pencil"></i>
				</button>
			@else
				<button type="button" title="Activar" onclick="change_state({{$ubicacion->id}},'ACTIVAR')" class="btn btn-transparent btn-xs pull-right">
					<i class="fa fa-check"></i>
				</button>
			@endif
		</td>
	</tr>
	@endforeach
	</tbody>
	</table>
</fieldset>