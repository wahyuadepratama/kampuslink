@include('partial/_header')

	<!--================Home Banner Area =================-->
	<section class="new_banner_area">
		<div class="banner-img bg-overlay-39">
			<div class="container">
				<h1>Login</h1>
				<ul>
	              <li><a href="/">Home</a></li>
	              <li>Login</li>
	            </ul>
			</div>
			<div class="box-position" style="background-image: url(client/img/banner/banner-bg.jpg);"></div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Login Box Area =================-->
	<section class="login_box_area p_120">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="{{asset('client/img/login.jpg')}}" alt="">
						<div class="hover">
							<h4>Belum punya akun?</h4>
							<p>Bergabunglah bersama kami untuk mendapatkan informasi terupdate dari kampusmu!</p>
							<a class="main_btn" href="/register">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
						<form class="row login_form" action="{{ route('login') }}" method="post" id="contactForm" novalidate="novalidate">
							{{ csrf_field() }}
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="identity" value="{{ old('username') }}" required autofocus placeholder="Username or Email">
							</div>
							<div class="col-md-12 form-group {{ $errors->has('password') ? ' has-error' : '' }}">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								@if ($errors->has('username'))
										<span>
												<strong class="text text-danger">{{ $errors->first('username') }}</strong>
										</span>
								@endif
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="btn submit_btn">Log In</button>
								<a href="{{ route('password.request') }}">Forgot Password?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

	@include('partial/_footer')

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	@include('partial/_script_footer')

</body>

</html>
