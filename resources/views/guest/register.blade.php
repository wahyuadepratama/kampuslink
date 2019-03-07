@include('partial/_header')

	<!--================Home Banner Area =================-->
	<section class="new_banner_area">
		<div class="banner-img bg-overlay-39">
			<div class="container">
				<h1>Register</h1>
				<ul>
	              <li><a href="/">Home</a></li>
	              <li>Register</li>
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
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="main_btn" href="/login">Login</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner reg_form">
						<h3>Create an Account</h3>
						<form class="row login_form" action="{{ route('register') }}" method="post">
							{{ csrf_field() }}

							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Name">
								@if ($errors->has('name'))
										<span class="help-block">
												<strong>{{ $errors->first('name') }}</strong>
										</span>
								@endif
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="pass" name="password_confirmation" placeholder="Confirm password">
								@if ($errors->has('password'))
										<span class="help-block">
												<strong>{{ $errors->first('password') }}</strong>
										</span>
								@endif
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Keep me logged in</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="btn submit_btn">Register</button>
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
