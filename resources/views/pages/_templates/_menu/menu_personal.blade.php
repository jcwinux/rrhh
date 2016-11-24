<div class="logo">
	<h4><a href="index.html"><strong>Personal</strong></a></h4>
</div>
<nav id="sidebar" class="sidebar nav-collapse collapse">
	<ul id="side-nav" class="side-nav">
		@foreach (Auth::user()->showMenu(3) as $row)
		<li class="active">
			<a href="#" onclick="location.href='{{url($row->ruta)}}'" title="{{$row->descripcion}}"><i class="{{$row->icono}}"></i> <span class="name">{{$row->nombre}}</span></a>
		</li>
	@endforeach
	</ul>
</nav>