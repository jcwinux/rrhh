@extends('pages._templates.template_base')
@section('content')
<header class="page-header">
	<div class="navbar">
		<ul class="nav navbar-nav navbar-right pull-right">
			<li class="divider"></li>
			<li>
				<a href="configuracion" id="settings"
				   title="Parámetros del sistema"
				   data-toggle="popover"
				   data-placement="bottom">
					<i class="glyphicon glyphicon-cog"></i>
				</a>
			</li>
			<li><a href="/logout" title="Cerrar sesión"><i class="glyphicon glyphicon-off"></i></a></li>
			<li>{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</li>
		</ul>
	</div>
</header>
<div class="container" style="margin-top: 60px;">
	<div class="row">
		 <div class="widget col-md-4 col-md-offset-4">
			<div id="carousel-example-generic" class="carousel slide">
				<ol class="carousel-indicators outer">
				@foreach ($modulos as $key=>$modulo)
					<li data-target="#carousel-example-generic" data-slide-to="{{$key}}" class="{{ ($key==0?' active':'') }}"></li>
				@endforeach
				</ol>
				<div class="carousel-inner text-align-center">
				@foreach ($modulos as $key=>$modulo)
					<div class="item {{ ($key==0?' active':'') }}">
						<h4 class="no-margin"><em>{{$modulo->nombre}}</em></h4>
						<div class="thumbnail" style="margin: 30px;">
							<a href="{{$modulo->ruta}}">
								<img src="img/5.jpg" alt="...">
							</a>
						</div>
						<p><small>{{$modulo->descripcion}}</small></p>
					</div>
				@endforeach
				</div>
				<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>
			</div>
		</div>
	</div>
</div>
@section('titulo')
	Mis Módulos
@stop