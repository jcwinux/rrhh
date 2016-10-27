@if (count($forms)>0)
<!--Hay que poner los js cuando son cargados por medio de ajax-->
<script src="{{asset('lib/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/tables-dynamic.js')}}"></script>
<fieldset>
	<table id="datatable-table" class="table table-striped table-hover" id="formularios_por_modulo" name="formularios_por_modulo">
	<thead>
		<tr>
			<th width="20%">Formulario</th>
			<th width="60%">Descripción</th>
			<th width="10%">Estado</th>
			<th width="10%">Opciones</th>
		</tr>
	</thead>
	<tbody id="det_item_catalogo">
	@foreach ($forms as $form)
	<tr>
		<td>{{$form->nombre}}</td>
		<td>{{$form->descripcion}}</td>
		<td>
			@if ($form->estado=="ACTIVO")
				<span class="label label-success">{{$form->estado}}</span>
			@else
				<span class="label label-default">{{$form->estado}}</span>
			@endif
		</td>
		<td class="text-align-center">
			@if ($form->estado=="ACTIVO")
				<button type="button" title="Inactivar" onclick="change_state({{$form->id}},'INACTIVAR')" class="btn btn-transparent btn-xs pull-right">
					<i class="fa fa-minus"></i>
				</button>
				<button type="button" title="Modificar" onclick="showCatalog({{$form->id}})" class="btn btn-transparent btn-xs pull-right editar_cat" data-toggle="modal" data-target="#modalCatalogoItem" data-backdrop="static">
				<i class="fa fa-pencil"></i>
			</button>
			@else
				<button type="button" title="Activar" onclick="change_state({{$form->id}},'ACTIVAR')" class="btn btn-transparent btn-xs pull-right">
					<i class="fa fa-plus"></i>
				</button>
			@endif
		</td>
	</tr>
	@endforeach
	</tbody>
	</table>
</fieldset>
@endif