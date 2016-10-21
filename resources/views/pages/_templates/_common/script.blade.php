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
        <!-- page specific libs -->
        
        
<script src="{{asset('lib/backbone/backbone.js')}}"></script>
<script src="{{asset('lib/backbone.paginator/lib/backbone.paginator.min.js')}}"></script>
<script src="{{asset('lib/backgrid/lib/backgrid.min.js')}}"></script>
<script src="{{asset('lib/backgrid-paginator/backgrid-paginator.js')}}"></script>
<script src="{{asset('lib/datatables/media/js/jquery.dataTables.min.js')}}"></script>

<!-- page application js -->
<script src="{{asset('js/tables-dynamic.js')}}"></script>

<!-- common application js -->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/settings.js')}}"></script>

<!-- forms -->
<script src="{{asset('lib/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('lib/select2/select2.min.js')}}"></script>
<script src="{{asset('lib/moment/moment.js')}}"></script>
<script src="{{asset('lib/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('lib/parsleyjs/dist/parsley.min.js')}}"></script>
<script src="{{asset('js/forms-account.js')}}"></script>
<script src="{{asset('js/ui-notifications.js')}}"></script>
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


<!--Funciones del sistema-->
@yield('javascript_functions')