<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="{{asset('client/img/logo-title.png')}}" type="image/png">
	<title>Kampus Link</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('client/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('client/vendors/linericon/style.css')}}">
	<link rel="stylesheet" href="{{asset('client/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('client/vendors/owl-carousel/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('client/vendors/lightbox/simpleLightbox.css')}}">
	<!-- <link rel="stylesheet" href="vendors/lightbox/lightbox.min.css"> -->
	<link rel="stylesheet" href="{{asset('client/vendors/nice-select/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{asset('client/vendors/animate-css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('client/vendors/jquery-ui/jquery-ui.css')}}">
	<link rel="stylesheet" href="{{asset('client/css/jquery.bxslider.css')}}">
	<!-- main css -->
	<link rel="stylesheet" href="{{asset('client/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('client/css/responsive.css')}}">
	<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>

<body>

	<!--================Header Menu Area =================-->
	<header class="header_area" id="top">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php">
						<img src="{{asset('client/img/logo.png')}}" alt="" class="logo">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row w-100">

							<div class="col-lg-7">
								<ul class="nav navbar-nav center_nav pull-right">
									<li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
										<a class="nav-link" href="/">Home</a>
									</li>
									<li class="nav-item {{ Request::is('event', 'event/*') ? 'active' : '' }}">
										<a class="nav-link" href="/event">Event</a>
									</li>
									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Koran</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="#">Coming Soon</a>
											</li>
										</ul>
									</li>
									<li class="nav-item {{ Request::is('kontak') ? 'active' : '' }}">
										<a class="nav-link" href="/kontak">Kontak</a>
									</li>
								</ul>
							</div>

							@if(isset(Auth::user()->role_id))

							<div class="col-lg-2">
								<ul class="nav navbar-nav navbar-right right_nav pull-right"><hr>
									<li class="nav-item">
										<a href="#" class="login">
											<img src="{{ asset('client/img/clients-logo/user.png') }}">
											<span>4</span>
										</a>
										<div class="mediaD">
											<div class="header">
												<div>
													<!-- <img src="{{ asset('storage/avatar/'. Auth::user()->photo_profile) }}" width="50"> -->
													<img src="{{ asset('client/img/clients-logo/user.png') }}" width="50">
												</div>
												<div>
													<h4>{{ Auth::user()->fullname }}</h4>
													<p>{{ Auth::user()->email }}</p>
												</div>
											</div>
											<div class="body">
												<ul>
													<li><a href="/transaction/1"><i class="fa fa-ticket"></i> Transaksi & Tiket</a> <span>4</span></li>
													<li><a href="/profile/2"><i class="fa fa-cog"></i> Edit Profil</a></li>
												</ul>
												<div class="logout">
													<a href="{{ route('logout') }}"
						                    onclick="event.preventDefault();
						                             document.getElementById('logout-form').submit();">Logout</a>
						              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						                  {{ csrf_field() }}
						              </form>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>

							@else

							<div class="col-lg-2">
								<ul class="nav navbar-nav navbar-right right_nav pull-right"><hr>
									<li class="nav-item">
										<a href="/login" class="login">
											LOGIN
										</a>
									</li>
									<hr>
								</ul>
							</div>

							@endif

						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<div class="go-top">
		<a href="#top" class="to-top"><i class="fa fa-angle-double-up fa-4x"></i></a>
	</div>
	<!--================Header Menu Area =================-->
