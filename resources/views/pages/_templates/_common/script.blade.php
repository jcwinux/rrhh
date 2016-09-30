<!-- common libraries. required for every page-->
<script src="{{asset('lib/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('lib/jquery-pjax/jquery.pjax.js')}}"></script>
<script src="{{asset('lib/bootstrap-sass/assets/javascripts/bootstrap.min.js')}}"></script>
<script src="{{asset('lib/widgster/widgster.js')}}"></script>
<script src="{{asset('lib/underscore/underscore.js')}}"></script>

<!-- common application js -->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/settings.js')}}"></script>

<!-- page specific scripts -->
<!-- page libs -->
<script src="{{asset('lib/slimScroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('lib/jquery.sparkline/index.js')}}"></script>

<script src="{{asset('lib/backbone/backbone.js')}}"></script>
<script src="{{asset('lib/backbone.localStorage/backbone.localStorage-min.js')}}"></script>

<script src="{{asset('lib/d3/d3.min.js')}}"></script>
<script src="{{asset('lib/nvd3/build/nv.d3.min.js')}}"></script>

<!-- page application js -->
<script src="{{asset('js/index.js')}}"></script>
<script src="{{asset('js/chat.js')}}"></script>

<!-- page template -->
<script type="text/template" id="message-template">
	<div class="sender pull-left">
		<div class="icon">
			<img src="img/2.png" class="img-circle" alt="">
		</div>
		<div class="time">
			just now
		</div>
	</div>
	<div class="chat-message-body">
		<span class="arrow"></span>
		<div class="sender"><a href="#">Tikhon Laninga</a></div>
		<div class="text">
			<%- text %>
		</div>
	</div>
</script>