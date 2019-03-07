@include('partial/_header')

	<!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Buat Akun Organisasi</h2>
					<div class="page_link">
						<a href="/">Home</a>
						<a href="/">Buat Akun Organisasi</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Login Box Area =================-->
	<section class="login_box_area p_120">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="login_form_inner reg_form">
						<h3>BUAT AKUN ORGANISASI</h3>
						<form class="row login_form" action="{{ url('store-register-organization') }}" method="post">
							{{ csrf_field() }}
							<div class="col-md-12 form-group">
								<input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Nama Organisasi" required>
								<span class="help-block">
										<strong></strong>
								</span>
							</div>
							<div class="col-md-12 form-group">
								<textarea class="form-control" name="description" placeholder="Deskripsi Organisasi">{{ old('description') }}</textarea>
								<span class="help-block">
										<strong></strong>
								</span>
							</div>
							<div class="form-group col-md-12">
								<div class="form-select" id="default-select">
									<select style="display: none;" name="campus">
										<option value="0">Pilih Kampus</option>
										@foreach($campus as $key)
										<option value="{{ $key->id }}">{{ $key->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector" required>
									<label for="f-option2"> Setuju dengan syarat dan ketentuan KampusLink </label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="btn submit_btn">Buat</button><br>
								@if ( count( $errors ) > 0 )
						      @foreach($errors->all() as $error)
						      <div class="alert alert-danger">
						        {{ $error }}
						      </div>
						      @endforeach
						    @endif
								@if($message = Session::get('error'))
						      <div class="alert alert-danger">
						        {{$message}}
						      </div>
						    @endif
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
