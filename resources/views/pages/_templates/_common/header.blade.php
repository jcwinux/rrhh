<header class="page-header">
	<div class="navbar">
		<ul class="nav navbar-nav navbar-right pull-right">
			<li class="dropdown">
				<a href="#" title="8 support tickets"
				   class="dropdown-toggle"
				   data-toggle="dropdown">
					<i class="glyphicon glyphicon-globe"></i>
					<span class="count">8</span>
				</a>
				<ul id="support-menu" class="dropdown-menu support" role="menu">
					<li role="presentation">
						<a href="#" class="support-ticket">
							<div class="picture">
								<span class="label label-important"><i class="fa fa-bell-o"></i></span>
							</div>
							<div class="details">
								Check out this awesome ticket
							</div>
						</a>
					</li>
					<li role="presentation">
						<a href="#" class="support-ticket">
							<div class="picture">
								<span class="label label-warning"><i class="fa fa-question-circle"></i></span>
							</div>
							<div class="details">
								"What is the best way to get ...
							</div>
						</a>
					</li>
					<li role="presentation">
						<a href="#" class="support-ticket">
							<div class="picture">
								<span class="label label-success"><i class="fa fa-tag"></i></span>
							</div>
							<div class="details">
								This is just a simple notification
							</div>
						</a>
					</li>
					<li role="presentation">
						<a href="#" class="support-ticket">
							<div class="picture">
								<span class="label label-info"><i class="fa fa-info-circle"></i></span>
							</div>
							<div class="details">
								12 new orders has arrived today
							</div>
						</a>
					</li>
					<li role="presentation">
						<a href="#" class="support-ticket">
							<div class="picture">
								<span class="label label-important"><i class="fa fa-plus"></i></span>
							</div>
							<div class="details">
								One more thing that just happened
							</div>
						</a>
					</li>
					<li role="presentation">
						<a href="#" class="text-align-center see-all">
							See all tickets <i class="fa fa-arrow-right"></i>
						</a>
					</li>
				</ul>
			</li>
			<li class="divider"></li>
			<li class="hidden-xs">
				<a href="#" id="settings"
				   title="Settings"
				   data-toggle="popover"
				   data-placement="bottom">
					<i class="glyphicon glyphicon-cog"></i>
				</a>
			</li>
			<li class="hidden-xs dropdown">
				<a href="#" title="Account" id="account"
				   class="dropdown-toggle"
				   data-toggle="dropdown">
					<i class="glyphicon glyphicon-user"></i>
				</a>
				<ul id="account-menu" class="dropdown-menu account" role="menu">
					<li role="presentation" class="account-picture">
						<img src="img/2.png" alt="">
						{{ Auth::user()->nombre }}
					</li>
					<li role="presentation">
						<a href="cambiarClave" class="link">
							<i class="glyphicon glyphicon-refresh"></i>
							Cambiar contraseña
						</a>
					</li>
				</ul>
			</li>
			<li class="visible-xs">
				<a href="#"
				   class="btn-navbar"
				   data-toggle="collapse"
				   data-target=".sidebar"
				   title="">
					<i class="fa fa-bars"></i>
				</a>
			</li>
			<li class="hidden-xs"><a href="logout" title="Cerrar sesión"><i class="glyphicon glyphicon-off"></i></a></li>
		</ul>
	</div>
</header>