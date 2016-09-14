<!-- light-blue - v3.3.0 - 2016-03-08 -->

<!DOCTYPE html>
<html>
<head>
    <title>Humalinks :: Inicio de sesión</title>
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
	<div class="single-widget-container">
		<section class="widget login-widget">
			<header class="text-align-center">
				<h4>Inicio de sesión</h4>
			</header>
			<div class="body">
				<form class="no-margin"
					  action="modulos" method="get">
					<fieldset>
						<div class="form-group">
							<label for="email" >Usuario</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="fa fa-user"></i>
								</span>
								<input id="user" type="text" class="form-control input-lg" placeholder="Ingrese usuario">
							</div>
						</div>
						<div class="form-group">
							<label for="password" >Contraseña</label>

							<div class="input-group input-group-lg">
								<span class="input-group-addon">
									<i class="fa fa-lock"></i>
								</span>
								<input id="password" type="password" class="form-control input-lg" placeholder="Ingrese contraseña">
							</div>
						</div>
					</fieldset>
					<div class="form-actions">
						<button type="submit" class="btn btn-block btn-lg btn-danger">
							<span class="small-circle"><i class="fa fa-caret-right"></i></span>
							<small>Ingresar</small>
						</button>
						<a class="forgot" href="#">¿Olvidó su usuario o contraseña?</a>
					</div>
				</form>
			</div>
		</section>
	</div>
</body>
</html>