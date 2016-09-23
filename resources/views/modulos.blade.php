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
			<li><a href="/" title="Cerrar sesión"><i class="glyphicon glyphicon-off"></i></a></li>
		</ul>
	</div>
</header>
<div class="container" style="margin-top: 60px;">
	<div class="row">
		 <div class="widget col-md-4 col-md-offset-4">
			<div id="carousel-example-generic" class="carousel slide">
				<ol class="carousel-indicators outer">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					<li data-target="#carousel-example-generic" data-slide-to="3"></li>
					<li data-target="#carousel-example-generic" data-slide-to="4"></li>
					<li data-target="#carousel-example-generic" data-slide-to="5"></li>
				</ol>
				<div class="carousel-inner text-align-center">
					<div class="item active">
						<h4 class="no-margin"><em>Reclutamiento y selección</em></h4>
						<div class="thumbnail" style="margin: 30px;">
							<a href="reclutamiento">
								<img src="img/5.jpg" alt="...">
							</a>
						</div>
						<p><small>Built-in Twitter Bootstrap 3 support</small></p>
					</div>
					<div class="item">
						<h4 class="no-margin"><em>Personal</em></h4>
						<div class="thumbnail" style="margin: 30px;">
							<a href="personal">
								<img src="img/5.jpg" alt="...">
							</a>
						</div>
						<p><small>Simple & intuitive code</small></p>
					</div>
					<div class="item">
						<h4 class="no-margin"><em>Horarios</em></h4>
						<div class="thumbnail" style="margin: 30px;">
							<a href="horarios">
								<img src="img/5.jpg" alt="...">
							</a>
						</div>
						<p><small>Light Blue is really easy to customize</small></p>
					</div>
					<div class="item">
						<h4 class="no-margin"><em>Beneficios</em></h4>
						<div class="thumbnail" style="margin: 30px;">
							<a href="beneficios">
								<img src="img/5.jpg" alt="...">
							</a>
						</div>
						<p><small>Light Blue is really easy to customize</small></p>
					</div>
					<div class="item">
						<h4 class="no-margin"><em>Nómina</em></h4>
						<div class="thumbnail" style="margin: 30px;">
							<a href="nomina">
								<img src="img/5.jpg" alt="...">
							</a>
						</div>
						<p><small>Light Blue is really easy to customize</small></p>
					</div>
					<div class="item">
						<h4 class="no-margin"><em>Evaluación</em></h4>
						<div class="thumbnail" style="margin: 30px;">
							<a href="evaluacion">
								<img src="img/5.jpg" alt="...">
							</a>
						</div>
						<p><small>Light Blue is really easy to customize</small></p>
					</div>
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