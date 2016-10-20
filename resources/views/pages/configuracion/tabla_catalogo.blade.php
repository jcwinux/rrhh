@if (count($catalogo)>0)
<fieldset>
	<legend class="section">
		Ítems
		<button id="agregar_item_cat" name="agregar_item_cat" type="button" class="btn btn-transparent btn-xs pull-right" data-toggle="modal" data-target="#modalCatalogoItem" data-backdrop="static">
			<i class="fa fa-plus"></i>
			Añadir
		</button>
	</legend>
	<table class="table table-hover table-bordered" id="items_cat_agregados" name="items_cat_agregados">
	<thead>
		<tr>
			<th width="10%">ID</th>
			<th width="80%">Descripción ítem</th>
			<th width="10%">Opciones</th>
		</tr>
	</thead>
	<tbody id="det_item_catalogo">
	@foreach ($catalogo as $cat)
	<tr>
		<td>{{$cat->id}}</td>
		<td>{{$cat->descripcion}}</td>
		<td class="text-align-center">
			<button type="button" class="btn btn-transparent btn-xs pull-right">
				<i class="glyphicon glyphicon-trash"></i>
			</button>
			<button type="button" onclick="showCatalog({{$cat->id}})" class="btn btn-transparent btn-xs pull-right editar_cat" data-toggle="modal" data-target="#modalCatalogoItem" data-backdrop="static">
				<i class="glyphicon glyphicon-pencil"></i>
			</button>
		</td>
	</tr>
	@endforeach
	</tbody>
	</table>
</fieldset>
@endif