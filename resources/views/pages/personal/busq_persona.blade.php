<!--Hay que poner los js cuando son cargados por medio de ajax-->
<script src="{{asset('lib/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/tables-dynamic.js')}}"></script>
<script src="{{asset('js/functions/tabla_busq_persona.js')}}"></script> 
<table class="table table-striped table-hover" id="busq_personas" name="busq_personas">
	<thead>
		<tr>
			<th width="20%">Num. ID</th>
			<th width="35%">Apellidos</th>
			<th width="35%">Nombre</th>
		</tr>
	</thead>
	<tbody>
	@foreach ($people as $person)
		<tr>
			<td>{{$person->num_identificacion}}</td>
			<td>{{$person->nombre_1}} {{$person->nombre_2}}</td>
			<td>{{$person->apellido_1}} {{$person->apellido_2}}</td>
		</tr>
	@endforeach
	</tbody>
</table>