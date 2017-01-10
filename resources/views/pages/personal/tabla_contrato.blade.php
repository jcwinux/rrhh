<!--Hay que poner los js cuando son cargados por medio de ajax-->
<script src="{{asset('lib/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/tables-dynamic.js')}}"></script>
@section('javascript_functions')
	 <script src="{{asset('js/functions/form_contrato.js')}}?{{$str_random[0]}}{{$str_random[1]}}{{$str_random[2]}}"></script> 
	 <script src="{{asset('js/functions/tabla_busq_persona.js')}}?{{$str_random[0]}}{{$str_random[1]}}{{$str_random[2]}}"></script> 
@stop
<fieldset>
	<legend class="section">
		Contratos
		<button id="agregar_contrato" name="agregar_contrato" type="button" class="btn btn-transparent btn-xs pull-right" data-toggle="modal" data-target="#modalContrato" data-backdrop="static">
			<i class="fa fa-plus"></i>
			Añadir
		</button>
	</legend>
	<table id="datatable-table" class="table table-striped table-hover"  name="contratos_agregados">
	<thead>
		<tr>
			<th width="10%">Tipo Doc.</th>
			<th width="10%">Empleado</th>
			<th width="10%">Contrato</th>
			<th width="25%">Cargo</th>
			<th width="15%">Departamento</th>
			<th width="10%">Inicio</th>
			<th width="10%">Fin</th>
			<th width="10%">Opciones</th>
		</tr>
	</thead>
	<tbody id="det_contrato">
		@foreach ($contratos as $contrato)
		<tr>
			<td>{{$contrato->doc_descripcion}}</td>
			<td>{{$contrato->num_identificacion}}</td>
			<td>{{$contrato->tipo_contrato}}</td>
			<td>{{$contrato->cargo}}</td>
			<td>{{$contrato->departamento}}</td>
			<td>{{$contrato->inicio_contrato}}</td>
			<td>{{$contrato->fin_contrato}}</td>
			<td class="text-align-center">
				@if ($contrato->estado=="ACTIVO")
					<button type="button" title="Modificar" onclick="showContrato({{$contrato->id}})" class="btn btn-transparent btn-xs pull-right editar_cat" data-toggle="modal" data-target="#modalContrato" data-backdrop="static">
					<i class="fa fa-pencil"></i>
				</button>
				@endif
			</td>
		</tr>
		@endforeach
	</tbody>
	</table>
</fieldset>