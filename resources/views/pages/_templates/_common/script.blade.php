<!-- common libraries. required for every page-->
<script src="lib/jquery/dist/jquery.min.js"></script>
<script src="lib/jquery-pjax/jquery.pjax.js"></script>
<script src="lib/bootstrap-sass/assets/javascripts/bootstrap.min.js"></script>
<script src="lib/widgster/widgster.js"></script>
<script src="lib/underscore/underscore.js"></script>

<!-- common application js -->
<script src="js/app.js"></script>
<script src="js/settings.js"></script>

<!-- page specific scripts -->
<!-- page libs -->
<script src="lib/slimScroll/jquery.slimscroll.min.js"></script>
<script src="lib/jquery.sparkline/index.js"></script>

<script src="lib/backbone/backbone.js"></script>
<script src="lib/backbone.localStorage/backbone.localStorage-min.js"></script>

<script src="lib/d3/d3.min.js"></script>
<script src="lib/nvd3/build/nv.d3.min.js"></script>

<!-- page application js -->
<script src="js/index.js"></script>
<script src="js/chat.js"></script>

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