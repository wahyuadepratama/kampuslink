@include('partial/_header')

	<!--================Home Banner Area =================-->
	<section class="new_banner_area">
		<div class="banner-img bg-overlay-39">
			<div class="container">
				<h1 style="margin-top:3%">{{$name}}</h1>
				<ul>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li>Buat Organisasi</li>
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
				<div class="col-lg-8">
					<div class="login_form_inner reg_form" style="padding: 20px;">
						<div class="alert alert-success" role="alert" style="font-size: 120%">
							Organisasi <b>{{ $name }}</b> berhasil didaftarkan!<br>
							Mohon tunggu konfirmasi dari Admin Kampus Link paling lambat 2x24 jam.<br>
							Setelah proses verifikasi selesai, kami akan membuatkan halaman dashboard khusus untuk organisasi kamu.
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
</script>

</body>

</html>
