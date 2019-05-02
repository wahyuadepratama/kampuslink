@include('partial/_header')

	<!--================Home Banner Area =================-->
	<section class="new_banner_area">
		<div class="banner-img bg-overlay-39">
			<div class="container">
				<h1 style="margin-top:3%">Register Organisasi</h1>
				<ul>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li>Register Organisasi</li>
        </ul>
			</div>
			<div class="box-position" style="background-image: url(client/img/banner/banner-bg.jpg);"></div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Login Box Area =================-->
	<section class="login_box_area p_120">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="login_form_inner reg_form">
						<h3>BUAT AKUN ORGANISASI</h3><br>
						<form class="row login_form" action="{{ url('store-register-organization') }}" method="post">
							{{ csrf_field() }}
							<div class="form-group col-md-12">
								<select name="campus" class="form-control">
									<option value="0">Pilih Kampus</option>
									@foreach($campus as $key)
									<option value="{{ $key->id }}">{{ $key->name }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Nama Organisasi" required>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" name="ig" value="{{ old('ig') }}" class="form-control" id="name" placeholder="Akun Instagram (ex: @neotelemetri)" required>
							</div>
							<div class="col-md-12 form-group">
								<textarea class="form-control" name="description" placeholder="Deskripsi Organisasi">{{ old('description') }}</textarea>
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector" required>
									<label for="f-option2"> Setuju dengan syarat dan ketentuan KampusLink </label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								@if(!Auth::check())
								<a class="btn submit_btn" data-toggle="modal" data-target="#modalLogin">Buat</a>
								@else
								<button type="submit" class="btn submit_btn" data-toggle="modal" data-target="#modalLogin">Buat</button><br>
								@endif
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

		<!-- Modal -->
		<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <div class="row">
		        	<div class="col-12">
		        		<div class="alert alert-success" role="alert" style="text-align:center">
								  Silahkah login terlebih dahulu sebelum mendaftarkan organisasi kamu.
								</div>
								<form action="{{ route('login') }}" method="post" style="margin: 10%">
									{{ csrf_field() }}
			        		<div class="form-group">
			        			<label>Username/Email</label>
			        			<input type="text" class="form-control" name="identity" value="{{ old('username') }}" required autofocus>
			        		</div>
			        		<div class="form-group">
			        			<label>Password</label>
			        			<input type="password" class="form-control" name="password" required>
			        		</div>
			        		<input type="submit" name="" class="btn btn-success btn-block">
									<input type="hidden" name="redirect" value="/register-organization">
		        		</form>
		        		<a href="/register">Belum terdaftar? Daftar disini!</a>
		        	</div>
		        </div>
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

<script type="text/javascript">
$(document).ready(function(){
	// $('button').click(function(){
	// 	Swal.fire({
	// 	  type: 'success',
	// 	  title: 'Berhasil',
	// 	  text: ''
	// 	});
	// });
	// doc => https://sweetalert2.github.io/
});
</script>


</body>

</html>
