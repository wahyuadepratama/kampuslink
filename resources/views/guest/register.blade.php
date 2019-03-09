@include('partial/_header')

	<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Login/Register</h2>
					<div class="page_link">
						<a href="/">Home</a>
						<a href="/register">Register</a>
					</div>
				</div>
			</div>
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
							<h4>Sudah punya akun?</h4>
							<p>Silahkan login disini untuk dapat membeli tiket secara online melalui KampusLink</p>
							<a class="main_btn" href="/login">Login</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner reg_form">
						<h3>Create an Account</h3>
						<form class="row" action="{{ route('register') }}" method="post" style="margin-right:5%;margin-left:5%">
							{{ csrf_field() }}
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Name" autofocus required value="{{ old('name') }}">
								@if ($errors->has('name'))
										<span class="help-block">
												<small><strong style="color: red">{{ $errors->first('name') }}</strong></small>
										</span>
								@endif
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="nim" name="nim" value="{{ old('nim') }}" required placeholder="NIM">
								@if ($errors->has('nim'))
										<span class="help-block">
												<small><strong style="color: red">{{ $errors->first('nim') }}</strong></small>
										</span>
								@endif
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}">
								@if ($errors->has('email'))
										<span class="help-block">
												<small><strong style="color: red">{{ $errors->first('email') }}</strong></small>
										</span>
								@endif
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="pass" name="password_confirmation" placeholder="Confirm password">
								@if ($errors->has('password'))
										<span class="help-block">
												<small><strong style="color:red">{{ $errors->first('password') }}</strong></small>
										</span>
								@endif
							</div>
							<div class="col-md-12 form-group">
							  <select class="form-control" name="campus" id="campus">

									<option value="0">Campus</option>
									@php $campus = \App\Models\Campus::all(); @endphp
									@foreach($campus as $keyCampus)
									<option value="{{ $keyCampus->id }}">{{ $keyCampus->name }}</option>
									@endforeach

							  </select>
								@if($message = Session::get('campus'))
									<span class="help-block">
											<small><strong style="color: red">{{ $message }}</strong></small>
									</span>
						    @endif
							</div>
							<div class="col-md-12 form-group">
							  <select class="form-control" name="faculty" id="faculty">

							    <option value="0">Faculty</option>

							  </select>
								@if($message = Session::get('faculty'))
									<span class="help-block">
											<small><strong style="color: red">{{ $message }}</strong></small>
									</span>
						    @endif
							</div>
							<div class="col-md-12 form-group">
							  <select class="form-control" name="program_study" id="program_study">

							    <option value="0">Program Study</option>

							  </select>
								@if ($errors->has('program_study'))
										<span class="help-block">
												<small><strong style="color: red">{{ $errors->first('program_study') }}</strong></small>
										</span>
								@endif
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
	<script type="text/javascript">

		$('#campus').on('change', function(){
			$.ajax({
				url: '/get-faculty/' + $('#campus').val(),
				data: "",
				dataType: 'json',
				success: function(rows)
				{
					var campus = [];
					var campusVal = [];
					for(var i in rows){
						var row = rows[i];
						var name = row.name;
						var value = row.id;

						campus.push(name);
						campusVal.push(value);
					}
					// console.log(campus);
					$('#faculty').html('');
					$('#program_study').html('');
					if(campus.length == 0){
						$('#faculty').append('<option value="0">Choose Another Campus</option>');
						$('#program_study').append('<option value="0">Choose Another Faculty</option>');
					}else{
						$('#faculty').append('<option value="0">Select Faculty</option>');
						$('#program_study').append('<option value="0">Select Program Study</option>');
						for (i = 0; i < campus.length; i++) {
							$('#faculty').append('<option value="'+ campusVal[i] +'">' + campus[i] + '</option>');
						}
					}
				}
			});

		});

		$('#faculty').on('change', function(){
			$.ajax({
				url: '/get-program-study/' + $('#faculty').val(),
				data: "",
				dataType: 'json',
				success: function(rows)
				{
					var faculty = [];
					var facultyVal = [];
					for(var i in rows){
						var row = rows[i];
						var name = row.name;
						var value = row.id;

						faculty.push(name);
						facultyVal.push(value);
					}
					// console.log(campus);
					$('#program_study').html('');
					if(faculty.length == 0){
						$('#program_study').append('<option value="0">Choose Another Faculty</option>');
					}else{
						$('#program_study').append('<option value="0">Select Program Study</option>');
						for (i = 0; i < faculty.length; i++) {
							$('#program_study').append('<option value="'+ facultyVal[i] +'">' + faculty[i] + '</option>');
						}
					}
				}
			});

		});

	</script>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	@include('partial/_script_footer')

</body>

</html>
