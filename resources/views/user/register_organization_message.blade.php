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
						<a href="/">Pemberitahuan</a>
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
					<div class="login_form_inner reg_form" style="padding: 20px;">
						<div class="alert alert-success" role="alert">
						  Berhasil untuk mendaftarkan organisasi "Nama Organisasi", mohon menunggu untuk dikonfirmasi oleh Admin Kampus Link, setelah dikonfirmasi kami akan memberi tahu kamu lewat pemberitahuan Kampus Link. Terima kasih.
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
