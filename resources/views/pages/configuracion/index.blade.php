@extends('pages._templates.template_configuracion')
@section('content')
<div class="wrap">
	<div class="content container">
        
	</div>
</div>
@stop
@section('javascript_functions')
	 <script src="{{asset('js/functions/form_persona_crear.js')}}?{{$str_random[0]}}{{$str_random[1]}}{{$str_random[2]}}"></script> 
@stop