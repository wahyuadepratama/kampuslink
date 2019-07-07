<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="{{asset('client/img/logo/icon.png')}}" type="image/png">
	<title>Kampus Link</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('client/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('client/vendors/linericon/style.css')}}">
	<link rel="stylesheet" href="{{asset('client/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<link rel="stylesheet" href="{{asset('client/vendors/owl-carousel/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('client/vendors/lightbox/simpleLightbox.css')}}">
	<!-- <link rel="stylesheet" href="vendors/lightbox/lightbox.min.css"> -->
	<!-- <link rel="stylesheet" href="{{asset('client/vendors/nice-select/css/nice-select.css')}}"> -->
	<link rel="stylesheet" href="{{asset('client/vendors/animate-css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('client/vendors/jquery-ui/jquery-ui.css')}}">
	<!-- <link rel="stylesheet" href="{{asset('client/css/jquery.bxslider.css')}}"> -->
	<link href="https://fonts.googleapis.com/css?family=Cabin|Dosis" rel="stylesheet">
	<!-- main css -->
	<link rel="stylesheet" href="{{asset('client/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('client/css/responsive.css')}}">
	<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> -->
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>

<body>

	<!--================Header Menu Area =================-->
	<header class="header_area" id="top">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="{{ url('/') }}">
						<img src="{{asset('client/img/logo/logo.png')}}" class="logo">
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
										<a class="nav-link" href="/" style="font-family: 'Cabin' !important">Home</a>
									</li>
									<li class="nav-item {{ Request::is('event', 'event/*') ? 'active' : '' }}">
										<a class="nav-link" href="/event" style="font-family: 'Cabin' !important">Event</a>
									</li>
									{{-- <li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-family: 'Cabin' !important">Koran</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="#"style="font-family: 'Cabin' !important">Coming Soon</a>
											</li>
										</ul>
									</li> --}}
									<li class="nav-item">
										<a href="/koran_b" class="nav-link" style="font-family: 'Cabin' !important">Koran</a>
									</li>
									<li class="nav-item {{ Request::is('kontak') ? 'active' : '' }}">
										<a class="nav-link" href="/kontak" style="font-family: 'Cabin' !important">Kontak</a>
									</li>

								</ul>
							</div>

							@if(isset(Auth::user()->role_id))

								@if(Auth::user()->role_id == 3)

								<div class="col-lg-2" style="font-family: 'Cabin' !important">
									<ul class="nav navbar-nav navbar-right right_nav pull-right"><hr>
										<li class="nav-item">
											<a href="#" class="login" id="klik_login">
												<img src="{{ asset('storage/avatar/'. Auth::user()->photo_profile) }}" style="border-radius: 50%">
												@php
												$count = \App\Models\Transaction::where('seen', false)->get(); $counted = count($count);
												if($counted>0){
													echo "<span>".$counted."</span>";
												}
												@endphp
											</a>
											<div class="mediaD">
												<div class="header">
													<div style="margin-right:3%">
														<img src="{{ asset('storage/avatar/'. Auth::user()->photo_profile) }}" width="50">
													</div>
													<div>
														<h4>{{ Auth::user()->fullname }}</h4>
														<p>{{ Auth::user()->email }}</p>
													</div>
												</div>
												<div class="body">
													<ul>
														<li>
															<a href="/transaction"><i class="fa fa-ticket"></i> Transaksi & Tiket</a>
															@php
															$count = \App\Models\Transaction::where('seen', false)->get(); $counted = count($count);
															if($counted>0){
																echo "<span>".$counted."</span>";
															}
															@endphp
														</li>
														<li><a href="/profile"><i class="fa fa-cog"></i> Edit Profil</a></li>
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

								@elseif(Auth::user()->role_id == 2)
								<div class="col-lg-2" style="font-family: 'Cabin' !important">
									<ul class="nav navbar-nav navbar-right right_nav pull-right">
										<li class="nav-item" style="display: flex;justify-content:center;align-items: center;padding-right: 10px;"><a class="nav-link lonceng" href="/" style="font-family: 'Cabin' !important"><i class="fas fa-bell fa-2x"></i></a></li><hr>
										<li class="nav-item">
											<a href="#" class="login">
												<img src="{{ asset('storage/avatar/'. Auth::user()->photo_profile) }}" style="border-radius: 50%;width: 36px;">
											</a>
											<div class="mediaD">
												<div class="header">
													<div style="margin-right:3%">
														<img src="{{ asset('storage/avatar/'. Auth::user()->photo_profile) }}" width="50" style="border-radius: 50%">
													</div>
													<div>
														<h4>{{ Auth::user()->fullname }}</h4>
														<p>{{ Auth::user()->email }}</p>
													</div>
												</div>
												<div class="body">
													<ul>

														@php $organization = \App\Models\UserOrganization::where('user_id', Auth::user()->id)->get(); @endphp
														@foreach($organization as $key)
														<a href="/organization/{{ $key->organization->instagram }}"><li><i class="fa fa-sitemap"></i>&nbsp; {{ $key->organization->name }}</li></a>
														@endforeach

														<a href="/transaction">
															<li><i class="fa fa-ticket"></i>&nbsp; Transaksi & Tiket
															@php $count = \App\Models\Transaction::where('seen', false)->get(); $counted = count($count);
															if($counted > 0){
																echo "<span>".$counted."</span>";
															}
															@endphp</li>
														</a>

														<a href="/profile"><li><i class="fa fa-cog"></i> &nbsp; Edit Profil</li></a>
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

								@elseif(Auth::user()->role_id == 1)

								<div class="col-lg-2">
									<ul class="nav navbar-nav navbar-right right_nav pull-right"><hr>
										<li class="nav-item">
											<a href="/admin" class="login">
												Dashboard
											</a>
										</li>
										<hr>
									</ul>
								</div>

								@endif

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
		<a href="#top" class="to-top"><i style="color: #019fe8" class="fa fa-angle-double-up fa-5x"></i></a>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	  // Add smooth scrolling to all links
	  $("a").on('click', function(event) {

	    // Make sure this.hash has a value before overriding default behavior
	    if (this.hash !== "") {
	      // Prevent default anchor click behavior
	      event.preventDefault();

	      // Store hash
	      var hash = this.hash;

	      // Using jQuery's animate() method to add smooth page scroll
	      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
	      $('html, body').animate({
	        scrollTop: $(hash).offset().top
	      }, 1500, function(){

	        // Add hash (#) to URL when done scrolling (default click behavior)
	        window.location.hash = hash;
	      });
	    } // End if
	  });

	  if($('body').width()<902){
		  $('.login').click(function(){
		  	$('.header_area .navbar-collapse').css('max-height','500px');
		  	$('.header_area .navbar-collapse').css('height','500px');
		  	// alert("berhasil");
		  });
	  }
	});
	</script>

	<!--================Header Menu Area =================-->
