<!--Hay que poner los js cuando son cargados por medio de ajax-->
<script src="{{asset('lib/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/tables-dynamic.js')}}"></script>
<script src="{{asset('js/functions/tabla_busq_persona.js')}}"></script> 
<table class="table table-striped table-hover" id="busq_personas" name="busq_personas">
	<thead>
		<tr>
			<th width="10%">Doc. Tipo</th>
			<th width="15%">Num. ID</th>
			<th width="15%">COD. INT.</th>
			<th width="25%">Apellidos</th>
			<th width="25%">Nombre</th>
			<th width="10%">Estado</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($people as $person)
		<tr>
			<td>{{$person->document_type_id}}</td>
			<td>{{$person->num_identificacion}}</td>
			<td>{{$person->id}}</td>
			<td>{{$person->nombre_1}} {{$person->nombre_2}}</td>
			<td>{{$person->apellido_1}} {{$person->apellido_2}}</td>
			<td>{{$person->estado}}</td>
		</tr>
	@endforeach
	</tbody>
</table>