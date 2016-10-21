@if (count($catalogo)>0)
<!--Hay que poner los js cuando son cargados por medio de ajax-->
<script src="{{asset('lib/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/tables-dynamic.js')}}"></script>
<fieldset>
	<legend class="section">
		Ítems
		<button id="agregar_item_cat" name="agregar_item_cat" onclick="clean()" type="button" class="btn btn-transparent btn-xs pull-right" data-toggle="modal" data-target="#modalCatalogoItem" data-backdrop="static">
			<i class="fa fa-plus"></i>
			Añadir
		</button>
	</legend>
	<table id="datatable-table" class="table table-striped table-hover" id="items_cat_agregados" name="items_cat_agregados">
	<thead>
		<tr>
			<th width="10%">ID</th>
			<th width="70%">Descripción ítem</th>
			<th width="10%">Estado</th>
			<th width="10%">Opciones</th>
		</tr>
	</thead>
	<tbody id="det_item_catalogo">
	@foreach ($catalogo as $cat)
	<tr>
		<td>{{$cat->id}}</td>
		<td>{{$cat->descripcion}}</td>
		<td>
			@if ($cat->estado=="ACTIVO")
				<span class="label label-success">{{$cat->estado}}</span>
			@else
				<span class="label label-default">{{$cat->estado}}</span>
			@endif
		</td>
		<td class="text-align-center">
			@if ($cat->estado=="ACTIVO")
				<button type="button" title="Inactivar" onclick="change_state({{$cat->id}},'INACTIVAR')" class="btn btn-transparent btn-xs pull-right">
					<i class="fa fa-times"></i>
				</button>
				<button type="button" title="Modificar" onclick="showCatalog({{$cat->id}})" class="btn btn-transparent btn-xs pull-right editar_cat" data-toggle="modal" data-target="#modalCatalogoItem" data-backdrop="static">
				<i class="fa fa-pencil"></i>
			</button>
			@else
				<button type="button" title="Activar" onclick="change_state({{$cat->id}},'ACTIVAR')" class="btn btn-transparent btn-xs pull-right">
					<i class="fa fa-check"></i>
				</button>
			@endif
		</td>
	</tr>
	@endforeach
	</tbody>
	</table>
</fieldset>
@endif