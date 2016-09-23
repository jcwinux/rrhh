<!-- common templates -->
<script type="text/template" id="settings-template">
    <div class="setting clearfix">
        <div>Menú lateral</div>
        <div id="sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% onRight = sidebar == 'right'%>
            <button type="button" data-value="left" class="btn btn-sm btn-default <%= onRight? '' : 'active' %>">Left</button>
            <button type="button" data-value="right" class="btn btn-sm btn-default <%= onRight? 'active' : '' %>">Right</button>
        </div>
    </div>
    <div class="setting clearfix">
        <div>Menú lateral</div>
        <div id="display-sidebar-toggle" class="pull-left btn-group" data-toggle="buttons-radio">
            <% display = displaySidebar%>
            <button type="button" data-value="true" class="btn btn-sm btn-default <%= display? 'active' : '' %>">Show</button>
            <button type="button" data-value="false" class="btn btn-sm btn-default <%= display? '' : 'active' %>">Hide</button>
        </div>
    </div>
	<div class="setting clearfix">
        <div>Módulos</div>
        <div class="pull-left btn-group" data-toggle="buttons-radio">
            <button onclick="location.href='modulos'" type="button" data-value="true" class="btn btn-sm btn-default <%= display? 'active' : '' %>">&nbsp;&nbsp;&nbsp;&nbsp;Cambiar&nbsp;&nbsp;&nbsp;</button>
        </div>
    </div>
</script>

<script type="text/template" id="sidebar-settings-template">
    <% auto = sidebarState == 'auto'%>
    <% if (auto) {%>
    <button type="button"
            data-value="icons"
            class="btn-icons btn btn-transparent btn-sm">Icons</button>
    <button type="button"
            data-value="auto"
            class="btn-auto btn btn-transparent btn-sm">Auto</button>
    <%} else {%>
    <button type="button"
            data-value="auto"
            class="btn btn-transparent btn-sm">Auto</button>
    <% } %>
</script>

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