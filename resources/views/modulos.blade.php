<!-- light-blue - v3.3.0 - 2016-03-08 -->

<!DOCTYPE html>
<html>
<head>
    <title>Humalinks :: Módulos</title>
    <link href="css/application.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <script>
        /* yeah we need this empty stylesheet here. It's cool chrome & chromium fix
           chrome fix https://code.google.com/p/chromium/issues/detail?id=167083
                      https://code.google.com/p/chromium/issues/detail?id=332189
        */
    </script>
</head>
<body>
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
			 <div class="widget col-md-6 col-md-offset-3">
				<div id="carousel-example-generic" class="carousel slide">
					<ol class="carousel-indicators outer">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner text-align-center">
						<div class="item active">
							<h4 class="no-margin"><em>Reclutamiento y selección</em></h4>
							<p><small>Built-in Twitter Bootstrap 3 support</small></p>
							<p><small>Built-in Twitter Bootstrap 3 support</small></p>
							<p><small>Built-in Twitter Bootstrap 3 support</small></p>
							<p><small>Built-in Twitter Bootstrap 3 support</small></p>
						</div>
						<div class="item">
							<h4 class="no-margin"><em>Personal</em></h4>
							<p><small>Simple & intuitive code</small></p>
							<p><small>Simple & intuitive code</small></p>
							<p><small>Simple & intuitive code</small></p>
							<p><small>Simple & intuitive code</small></p>
						</div>
						<div class="item">
							<h4 class="no-margin"><em>Nómina</em></h4>
							<p><small>Light Blue is really easy to customize</small></p>
							<p><small>Light Blue is really easy to customize</small></p>
							<p><small>Light Blue is really easy to customize</small></p>
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
	<script src="lib/jquery/dist/jquery.min.js"></script>
	<script src="lib/jquery-pjax/jquery.pjax.js"></script>
	<script src="lib/bootstrap-sass/assets/javascripts/bootstrap.min.js"></script>
	<script src="lib/widgster/widgster.js"></script>
	<script src="lib/underscore/underscore.js"></script>

	<!-- common application js -->
	<script src="js/app.js"></script>
	<script src="js/settings.js"></script>
</body>
</html>