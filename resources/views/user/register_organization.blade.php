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
						<form class="row login_form" action="#" method="post">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" placeholder="Nama Organisasi">
								<span class="help-block">
										<strong></strong>
								</span>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" placeholder="Nama Kampus">
								<span class="help-block">
										<strong></strong>
								</span>
							</div>
							<div class="form-group col-md-12">
								<div class="form-select" id="default-select">
									<select style="display: none;">
										<option value="">==Tingkat Organisasi==</option>
										<option value="1">Jurusan</option>
										<option value="1">Fakultas</option>
										<option value="1">Kampus</option>
									</select>
									<div class="nice-select" tabindex="0">
										<span class="current">==Tingkat Organisasi==</span>
										<ul class="list">
											<li data-value="1" class="option">Jurusan</li>
											<li data-value="1" class="option">Fakultas</li>
											<li data-value="1" class="option">Kampus</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<textarea class="form-control" placeholder="Lokasi Organisasi"></textarea>
								<span class="help-block">
										<strong></strong>
								</span>
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Setuju dengan syarat dan ketentuan KampusLink</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="button" value="submit" class="btn submit_btn">Buat</button>
								<!-- doc => https://sweetalert2.github.io/  -->
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
<script type="text/javascript">
$(document).ready(function(){
	$('button').click(function(){
		Swal.fire({
		  type: 'success',
		  title: 'Berhasil',
		  text: ''
		});
	});
	// doc => https://sweetalert2.github.io/
});
</script>

</body>

</html>
