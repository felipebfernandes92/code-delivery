<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 1.0
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
	<meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
	<title>Login Page | Materialize - Material Design Admin Template</title>

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
	<link href="{{ asset('css/page-center.css') }}" type="text/css" rel="stylesheet" media="screen,projection">

	<!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
	<link href="{{ asset('css/prism.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
	<link href="{{ asset('js/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css" rel="stylesheet" media="screen,projection">

</head>

<body class="cyan">
<!-- Start Page Loading -->
<div id="loader-wrapper">
	<div id="loader"></div>
	<div class="loader-section section-left"></div>
	<div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->



<div id="login-page" class="row">
	<div class="col s12 z-depth-4 card-panel">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
		<form class="login-form" role="form" method="POST" action="{{ url('/auth/login') }}">
			{!! csrf_field() !!}

			<div class="row">
				<div class="input-field col s12 center">
					<p class="center login-form-text">Água Delivery</p>
				</div>
			</div>
			<div class="row margin">
				<div class="input-field col s12">
					<i class="mdi-social-person-outline prefix"></i>
					<input type="email" id="email" name="email" value="{{ old('email') }}">
					<label for="email" class="center-align">Email</label>
				</div>
			</div>
			<div class="row margin">
				<div class="input-field col s12">
					<i class="mdi-action-lock-outline prefix"></i>
					<input id="password" name="password" type="password">
					<label for="password">Password</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m12 l12  login-text">
					<input type="checkbox" id="rememberme" />
					<label for="rememberme">Lembrar-me</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<button type="submit" class="btn waves-effect waves-light col s12">Login</button>
				</div>
			</div>

		</form>
	</div>
</div>



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

<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>

</body>

</html>
