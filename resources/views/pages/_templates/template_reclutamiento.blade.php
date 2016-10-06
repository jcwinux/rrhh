<!-- light-blue - v3.3.0 - 2016-03-08 -->
<!DOCTYPE html>
<html>
<head>
	<title>{{ config('app.name') }} :: Reclutamiento </title>
   @include('pages._templates._common.head')
</head>
<body>
	@include('pages._templates._menu.menu_reclutamiento')
	@include('pages._templates._common.header')
	@yield('content')
	@include('pages._templates._common.script')
	@include('pages._templates._common.script_boton_conf')
</body>
</html>