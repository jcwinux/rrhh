<!--Hay que poner los js cuando son cargados por medio de ajax-->
<script src="{{asset('lib/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/tables-dynamic.js')}}"></script>
<fieldset>
	<legend class="section">
		Contratos
		<button id="agregar_contrato" name="agregar_contrato" type="button" class="btn btn-transparent btn-xs pull-right" data-toggle="modal" data-target="#modalContrato" data-backdrop="static">
			<i class="fa fa-plus"></i>
			Añadir
		</button>
	</legend>
	<table id="datatable-table" class="table table-striped table-hover" id="contratos_agregados" name="contratos_agregados">
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
	<tbody id="det_contrato">
	</tbody>
	</table>
</fieldset>