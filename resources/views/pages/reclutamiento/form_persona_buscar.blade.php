@extends('pages._templates.template_reclutamiento')
@section('content')
<!--Datatable-->
<div class="wrap">
	<div class="content container">
		<section class="widget">
            <div class="body">
				 <p>
                    Búsqueda de personas
                </p>
                <div class="mt">
                    <table id="datatable-table" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
							<th>Tipo. ID.</th>
                            <th>Num. ID.</th>
                            <th>Apellidos</th>
							<th>Nombres</th>
							<th>Fecha Ncto.</th>
							<th>Estado</th>
							<th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
						@foreach ($personas as $persona)
                        <tr>
                            <td>{{$persona->id}}</td>
							<td>{{$persona->descripcion}}</td>
							<td>{{$persona->num_identificacion}}</td>
							<td>{{$persona->nombre_1}} {{$persona->nombre_2}}</td>
							<td>{{$persona->apellido_1}} {{$persona->apellido_2}}</td>
							<td>{{$persona->fecha_ncto}}</td>
							<td>{{$persona->estado}}</td>
							<td class="text-align-center">
								<a title="Editar" class="btnDelEstudio" href="persona_edit/{{$persona->id}}">
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
							</td>
                        </tr>
						@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
	</div>
</div>
@stop
@section('javascript_functions')
	 
@stop