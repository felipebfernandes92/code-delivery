<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="msapplication-tap-highlight" content="no">
	<title>Água Delivery</title>

	<!-- Favicons-->
	<link rel="icon" href="{{ asset('images/favicon/favicon-32x32.png') }}" sizes="32x32">
	<!-- Favicons-->
	<link rel="apple-touch-icon-precomposed" href="{{ asset('images/favicon/apple-touch-icon-152x152.png') }}">
	<!-- For iPhone -->
	<meta name="msapplication-TileColor" content="#00bcd4">
	<meta name="msapplication-TileImage" content="{{ asset('images/favicon/mstile-144x144.png') }}">
	<!-- For Windows Phone -->

	<!-- CORE CSS-->
	<link href="{{ asset('css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
	<link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" media="screen,projection">

	<!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
	<link href="{{ asset('css/prism.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
	<link href="{{ asset('js/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css" rel="stylesheet"
		  media="screen,projection">
	<link href="{{ asset('js/plugins/chartist-js/chartist.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
	<link href="{{ asset('js/plugins/data-tables/css/jquery.dataTables.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
</head>

<body>
<!-- Start Page Loading -->
<div id="loader-wrapper">
	<div id="loader"></div>
	<div class="loader-section section-left"></div>
	<div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->

<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- START HEADER -->
<header id="header" class="page-topbar">
	<!-- start header nav-->
	<div class="navbar-fixed">
		<nav class="cyan">
			<div class="nav-wrapper">
				<h1 class="logo-wrapper"><a href="index.html" class="brand-logo darken-1"><img
								src="{{ asset('images/logo.png') }}" class="logo" alt="materialize logo"></a> <span class="logo-text">Materialize</span>
				</h1>
				<ul class="right hide-on-med-and-down">
					<li class="search-out">
						<input type="text" class="search-out-text">
					</li>
					<li>
						<a href="javascript:void(0);" class="waves-effect waves-block waves-light show-search"><i
									class="mdi-action-search"></i></a>
					</li>
					<li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i
									class="mdi-action-settings-overscan"></i></a>
					</li>
					<!-- Dropdown Trigger -->
					<li><a href="#" data-activates="chat-out"
						   class="waves-effect waves-block waves-light chat-collapse"><i
									class="mdi-communication-chat"></i></a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
	<!-- end header nav-->
</header>
<!-- END HEADER -->

<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- START MAIN -->
<div id="main">
	<!-- START WRAPPER -->
	<div class="wrapper">

		<!-- START LEFT SIDEBAR NAV-->
		<aside id="left-sidebar-nav">
			<ul id="slide-out" class="side-nav fixed leftside-navigation">
				<li class="user-details cyan darken-2">
					<div class="row">
						<div class="col col s4 m4 l4">
							<img src="{{ asset('images/avatar.jpg') }}" alt="" class="circle responsive-img valign profile-image">
						</div>
						<div class="col col s8 m8 l8">
							<ul id="profile-dropdown" class="dropdown-content">
								<li><a href="#"><i class="mdi-action-lock-outline"></i> Bloquear</a>
								</li>
								<li><a href="{{ url('/auth/logout') }}"><i class="mdi-hardware-keyboard-tab"></i> Sair</a>
								</li>
							</ul>
							<a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#"
							   data-activates="profile-dropdown">{{ auth()->user()->name }}<i
										class="mdi-navigation-arrow-drop-down right"></i></a>
							<p class="user-roal">{{ auth()->user()->role }}</p>
						</div>
					</div>
				</li>
				<li class="bold"><a href="{{ url('/') }}" class="waves-effect waves-cyan"><i
								class="mdi-action-home"></i> Início</a>
				</li>
				@if(Auth::user())
					@if(Auth::user()->role == "admin")
				<li class="bold"><a href="{{ route('admin.categorias.index') }}" class="waves-effect waves-cyan"><i
								class="mdi-action-assignment"></i> Categorias</a>
				</li>
				<li class="bold"><a href="{{ route('admin.produtos.index') }}" class="waves-effect waves-cyan"><i
								class="mdi-maps-local-mall"></i> Produtos</a>
				</li>
				<li class="bold"><a href="{{ route('admin.clientes.index') }}" class="waves-effect waves-cyan"><i
								class="mdi-social-people"></i> Clientes</a>
				</li>
				<li class="bold"><a href="{{ route('admin.sensores.index') }}" class="waves-effect waves-cyan"><i
								class="mdi-action-settings-remote"></i> Sensores</a>
				</li>
				<li class="bold"><a href="{{ route('admin.cupons.index') }}" class="waves-effect waves-cyan"><i
								class="mdi-maps-local-offer"></i> Cupons</a>
				</li>
				<li class="bold"><a href="{{ route('admin.pedidos.index') }}" class="waves-effect waves-cyan"><i
								class="mdi-action-shopping-basket"></i> Pedidos</a>
				</li>
					@else
						<li class="bold"><a href="{{ route('customer.order.index') }}" class="waves-effect waves-cyan"><i
										class="mdi-action-shopping-basket"></i> Pedidos</a>
						</li>
					@endif
				@endif
			</ul>
			<a href="#" data-activates="slide-out"
			   class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i
						class="mdi-navigation-menu"></i></a>
		</aside>
		<!-- END LEFT SIDEBAR NAV-->

		<!-- //////////////////////////////////////////////////////////////////////////// -->

		<!-- START CONTENT -->
		<section id="content">

			<!--breadcrumbs start-->
			<div id="breadcrumbs-wrapper" class=" grey lighten-3">
				<div class="container">
					<div class="row">
						<div class="col s12 m12 l12">
							@yield('breadcrumb')
						</div>
					</div>
				</div>
			</div>
			<!--breadcrumbs end-->


			<!--start container-->
			<div class="container">
				<div class="section">
					@yield('content')
				</div>
			</div>
			<!--end container-->
		</section>
		<!-- END CONTENT -->

		<!-- //////////////////////////////////////////////////////////////////////////// -->
		<!-- START RIGHT SIDEBAR NAV-->
		<aside id="right-sidebar-nav">
			<ul id="chat-out" class="side-nav rightside-navigation">
				<li class="li-hover">
					<a href="#" data-activates="chat-out" class="chat-close-collapse right"><i
								class="mdi-navigation-close"></i></a>
					<div id="right-search" class="row">
						<form class="col s12">
							<div class="input-field">
								<i class="mdi-action-search prefix"></i>
								<input id="icon_prefix" type="text" class="validate">
								<label for="icon_prefix">Search</label>
							</div>
						</form>
					</div>
				</li>
				<li class="li-hover">
					<ul class="chat-collapsible" data-collapsible="expandable">
						<li>
							<div class="collapsible-header teal white-text active"><i class="mdi-social-whatshot"></i>Recent
								Activity
							</div>
							<div class="collapsible-body recent-activity">
								<div class="recent-activity-list chat-out-list row">
									<div class="col s3 recent-activity-list-icon"><i
												class="mdi-action-add-shopping-cart"></i>
									</div>
									<div class="col s9 recent-activity-list-text">
										<a href="#">just now</a>
										<p>Jim Doe Purchased new equipments for zonal office.</p>
									</div>
								</div>
								<div class="recent-activity-list chat-out-list row">
									<div class="col s3 recent-activity-list-icon"><i
												class="mdi-device-airplanemode-on"></i>
									</div>
									<div class="col s9 recent-activity-list-text">
										<a href="#">Yesterday</a>
										<p>Your Next flight for USA will be on 15th August 2015.</p>
									</div>
								</div>
								<div class="recent-activity-list chat-out-list row">
									<div class="col s3 recent-activity-list-icon"><i
												class="mdi-action-settings-voice"></i>
									</div>
									<div class="col s9 recent-activity-list-text">
										<a href="#">5 Days Ago</a>
										<p>Natalya Parker Send you a voice mail for next conference.</p>
									</div>
								</div>
								<div class="recent-activity-list chat-out-list row">
									<div class="col s3 recent-activity-list-icon"><i class="mdi-action-store"></i>
									</div>
									<div class="col s9 recent-activity-list-text">
										<a href="#">Last Week</a>
										<p>Jessy Jay open a new store at S.G Road.</p>
									</div>
								</div>
								<div class="recent-activity-list chat-out-list row">
									<div class="col s3 recent-activity-list-icon"><i
												class="mdi-action-settings-voice"></i>
									</div>
									<div class="col s9 recent-activity-list-text">
										<a href="#">5 Days Ago</a>
										<p>Natalya Parker Send you a voice mail for next conference.</p>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="collapsible-header light-blue white-text active"><i
										class="mdi-editor-attach-money"></i>Sales Repoart
							</div>
							<div class="collapsible-body sales-repoart">
								<div class="sales-repoart-list  chat-out-list row">
									<div class="col s8">Target Salse</div>
									<div class="col s4"><span id="sales-line-1"></span>
									</div>
								</div>
								<div class="sales-repoart-list chat-out-list row">
									<div class="col s8">Payment Due</div>
									<div class="col s4"><span id="sales-bar-1"></span>
									</div>
								</div>
								<div class="sales-repoart-list chat-out-list row">
									<div class="col s8">Total Delivery</div>
									<div class="col s4"><span id="sales-line-2"></span>
									</div>
								</div>
								<div class="sales-repoart-list chat-out-list row">
									<div class="col s8">Total Progress</div>
									<div class="col s4"><span id="sales-bar-2"></span>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="collapsible-header red white-text"><i class="mdi-action-stars"></i>Favorite
								Associates
							</div>
							<div class="collapsible-body favorite-associates">
								<div class="favorite-associate-list chat-out-list row">
									<div class="col s4"><img src="{{ asset('images/avatar.jpg') }}" alt=""
															 class="circle responsive-img online-user valign profile-image">
									</div>
									<div class="col s8">
										<p>Eileen Sideways</p>
										<p class="place">Los Angeles, CA</p>
									</div>
								</div>
								<div class="favorite-associate-list chat-out-list row">
									<div class="col s4"><img src="{{ asset('images/avatar.jpg') }}" alt=""
															 class="circle responsive-img online-user valign profile-image">
									</div>
									<div class="col s8">
										<p>Zaham Sindil</p>
										<p class="place">San Francisco, CA</p>
									</div>
								</div>
								<div class="favorite-associate-list chat-out-list row">
									<div class="col s4"><img src="{{ asset('images/avatar.jpg') }}" alt=""
															 class="circle responsive-img offline-user valign profile-image">
									</div>
									<div class="col s8">
										<p>Renov Leongal</p>
										<p class="place">Cebu City, Philippines</p>
									</div>
								</div>
								<div class="favorite-associate-list chat-out-list row">
									<div class="col s4"><img src="{{ asset('images/avatar.jpg') }}" alt=""
															 class="circle responsive-img online-user valign profile-image">
									</div>
									<div class="col s8">
										<p>Weno Carasbong</p>
										<p>Tokyo, Japan</p>
									</div>
								</div>
								<div class="favorite-associate-list chat-out-list row">
									<div class="col s4"><img src="{{ asset('images/avatar.jpg') }}" alt=""
															 class="circle responsive-img offline-user valign profile-image">
									</div>
									<div class="col s8">
										<p>Nusja Nawancali</p>
										<p class="place">Bangkok, Thailand</p>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</aside>
		<!-- LEFT RIGHT SIDEBAR NAV-->

	</div>
	<!-- END WRAPPER -->

</div>
<!-- END MAIN -->


<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- START FOOTER -->
<footer class="page-footer">
	<div class="footer-copyright">
		<div class="container">
			<span>Copyright © 2017 <a class="grey-text text-lighten-4" href="" target="_blank">Água Delivery</a> Todos os direitos reservados.</span>
			<span class="right"> Trabalho de Conclusão de Curso UNISUL</span>
		</div>
	</div>
</footer>
<!-- END FOOTER -->


<!-- ================================================
Scripts
================================================ -->

<!-- jQuery Library -->
<script type="text/javascript" src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
<!--materialize js-->
<script type="text/javascript" src="{{ asset('js/materialize.js') }}"></script>
<!--prism-->
<script type="text/javascript" src="{{ asset('js/prism.js') }}"></script>
<!--scrollbar-->
<script type="text/javascript" src="{{ asset('js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<!-- chartist -->
<script type="text/javascript" src="{{ asset('js/plugins/chartist-js/chartist.min.js') }}"></script>
<!-- data-tables -->
<script type="text/javascript" src="{{ asset('js/plugins/data-tables/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/plugins/data-tables/data-tables-script.js') }}"></script>

<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>

@yield('post-script')

</body>
</html>