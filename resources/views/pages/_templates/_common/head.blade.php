<title>{{ config('app.name') }} :: @yield('titulo') </title>
<link href="{{asset('css/application.css')}}" rel="stylesheet">
<link rel="shortcut icon" href="{{asset('favicon.ico')}}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="description" content="">
<meta name="author" content="">
<meta charset="utf-8">
<script>
	/* yeah we need this empty stylesheet here. It's cool chrome & chromium fix
	   chrome fix https://code.google.com/p/chromium/issues/detail?id=167083
				  https://code.google.com/p/chromium/issues/detail?id=332189
	*/
</script>