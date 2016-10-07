<!-- light-blue - v3.3.0 - 2016-03-08 -->
<!DOCTYPE html>
<html>
<head>
	<title>{{ config('app.name') }} :: @yield('titulo') </title>
   @include('pages._templates._common.head')
</head>
<body>
	@yield('content')
	@include('pages._templates._common.script')
</body>
</html>