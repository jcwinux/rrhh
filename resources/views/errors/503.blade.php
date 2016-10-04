@extends('pages._templates.template_base')
@section('content')
<div class="error-page container">
	<main id="content" class="error-container" role="main">
		<div class="row">
			<div class="col-lg-4 col-sm-6 col-xs-10 col-lg-offset-4 col-sm-offset-3 col-xs-offset-1">
				<div class="error-container">
					<h1 class="error-code">503</h1>
					<p class="error-info">
						Fuera de línea por mantenimiento
					</p>
				</div>
			</div>
		</div>
	</main>
</div>
@section('titulo')
	Offline
@stop