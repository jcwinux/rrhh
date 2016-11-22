<!--Hay que poner los js cuando son cargados por medio de ajax-->
<script src="{{asset('lib/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/tables-dynamic.js')}}"></script>
<fieldset>
	<legend class="section">
		Departamentos
		<button id="agregar_departamento" name="agregar_departamento" type="button" class="btn btn-transparent btn-xs pull-right" data-toggle="modal" data-target="#modalDepartamento" data-backdrop="static">
			<i class="fa fa-plus"></i>
			Añadir
		</button>
	</legend>
	<table id="datatable-table" class="table table-striped table-hover" id="departamentos_agregados" name="departamentos_agregados">
	<thead>
		<tr>
			<th width="5%">ID</th>
			<th width="35%">Nombre</th>
			<th width="40%">Descripción</th>
			<th width="10%">Estado</th>
			<th width="10%">Opciones</th>
		</tr>
	</thead>
	<tbody id="det_usuarios">
	@foreach ($departamentos as $departamento)
	<tr>
		<td>{{$departamento->id}}</td>
		<td>{{$departamento->nombre}}</td>
		<td>{{$departamento->descripcion}}</td>
		<td>
			@if ($departamento->estado=="ACTIVO")
				<span class="label label-success">{{$departamento->estado}}</span>
			@else
				<span class="label label-default">{{$departamento->estado}}</span>
			@endif
		</td>
		<td class="text-align-center">
			@if ($departamento->estado=="ACTIVO")
				<button type="button" title="Inactivar" onclick="change_state({{$departamento->id}},'INACTIVAR')" class="btn btn-transparent btn-xs pull-right">
					<i class="fa fa-times"></i>
				</button>
				<button type="button" title="Modificar" onclick="showDepartamento({{$departamento->id}})" class="btn btn-transparent btn-xs pull-right editar_cat" data-toggle="modal" data-target="#modalDepartamento" data-backdrop="static">
					<i class="fa fa-pencil"></i>
				</button>
			@else
				<button type="button" title="Activar" onclick="change_state({{$departamento->id}},'ACTIVAR')" class="btn btn-transparent btn-xs pull-right">
					<i class="fa fa-check"></i>
				</button>
			@endif
		</td>
	</tr>
	@endforeach
	</tbody>
	</table>
</fieldset>