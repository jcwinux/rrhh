<!--Hay que poner los js cuando son cargados por medio de ajax-->
<script src="{{asset('lib/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/tables-dynamic.js')}}"></script>
<fieldset>
	<legend class="section">
		Usuarios
		<button id="agregar_usuario" name="agregar_usuario" onclick="clear();" type="button" class="btn btn-transparent btn-xs pull-right" data-toggle="modal" data-target="#modalUsuario" data-backdrop="static">
			<i class="fa fa-plus"></i>
			Añadir
		</button>
	</legend>
	<table id="datatable-table" class="table table-striped table-hover" id="usuarios_agregados" name="usuarios_agregados">
	<thead>
		<tr>
			<th width="5%">ID</th>
			<th width="15%">Usuario</th>
			<th width="20%">Nombres</th>
			<th width="20%">Apellidos</th>
			<th width="20%">Correo</th>
			<th width="10%">Estado</th>
			<th width="10%">Opciones</th>
		</tr>
	</thead>
	<tbody id="det_usuarios">
	@foreach ($users as $user)
	<tr>
		<td>{{$user->id}}</td>
		<td>{{$user->username}}</td>
		<td>{{$user->nombre}}</td>
		<td>{{$user->apellido}}</td>
		<td>{{$user->correo}}</td>
		<td>
			@if ($user->estado=="ACTIVO")
				<span class="label label-success">{{$user->estado}}</span>
			@else
				<span class="label label-default">{{$user->estado}}</span>
			@endif
		</td>
		<td class="text-align-center">
			@if ($user->estado=="ACTIVO")
				<button type="button" title="Inactivar" onclick="change_state({{$user->id}},'INACTIVAR')" class="btn btn-transparent btn-xs pull-right">
					<i class="fa fa-times"></i>
				</button>
				<button type="button" title="Modificar" onclick="showUser({{$user->id}})" class="btn btn-transparent btn-xs pull-right editar_cat" data-toggle="modal" data-target="#modalUsuario" data-backdrop="static">
				<i class="fa fa-pencil"></i>
			</button>
			@else
				<button type="button" title="Activar" onclick="change_state({{$user->id}},'ACTIVAR')" class="btn btn-transparent btn-xs pull-right">
					<i class="fa fa-check"></i>
				</button>
			@endif
		</td>
	</tr>
	@endforeach
	</tbody>
	</table>
</fieldset>