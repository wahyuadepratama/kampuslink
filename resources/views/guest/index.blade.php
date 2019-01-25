@include('partial/_header')

	<!--================Home Banner Area =================-->
	<section class="home_banner_area">
		<div class="overlay"></div>
		<div class="banner_inner d-flex align-items-center">
			<div class="container-fluid">

				<div class="banner_content row">
					<div class="offset-lg-2 col-lg-8">
						<h3>Kampus Link
							<br />Event</h3>
						<p>Membuat kamu lebih mudah untuk mencari event yang diinginkan. Pada tahap ini kami dalam
						pengembangan ke seluruh
						    organisasi di Universitas Andalas, nantikan kami di kampus kamu gays.</p>
						<a class="x-button" href="/category">Lihat Event</a>
					</div>
				</div>

				<div class="search-menu"></div>

				<div class="search-box col-lg-10">
					<form>
						<div class="kategori">
							<select>
								<option selected="" value="">KATEGORI</option>
								<option>E-SPORT</option>
								<option>SEMINAR</option>
							</select>
						</div>
						<div class="cari">
							<input id="cari" type="text" name="" placeholder="CARI BERDASARKAN KATEGORI...">
						</div>
						<div class="submit">
							<button type="submit">SEARCH</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</section>

	<!--================End Home Banner Area =================-->

	<!--================Hot Deals Area =================-->
	<section class="hot_deals_area section_gap">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<div class="hot_deal_box">
						<img class="img-fluid" src="{{asset('client/img/product/hot_deals/deal1.jpg')}}" alt="">
						<div class="content">
							<!-- <h2>Daftarkan Dirimu Agar Kami Tahu Kampus Mu</h2> -->
							<!-- <h2>Daftarkan Diri Agar Kamu Tahu Teman Kampus Mu Yang Telah Tergabung</h2> -->
							<h2>Daftarkan Dirimu</h2>
							<p>Daftarkan Diri Agar Kamu Tahu Teman Kampus Mu Yang Telah Tergabung</p>
						</div>
						<a class="hot_deal_link" href="/login"></a>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="hot_deal_box">
						<img class="img-fluid" src="{{asset('client/img/product/hot_deals/deal1.jpg')}}" alt="">
						<div class="content">
							<h2>Daftarkan Organisasi Kamu Disini</h2>
							<p>go!</p>
						</div>
						<a class="hot_deal_link" href="/login"></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Hot Deals Area =================-->

	<!--================Kategori =================-->
	<section class="clients_logo_area">
		<div class="container-fluid">
			<h3>KATEGORI</h3>
			<div class="clients_slider owl-carousel kategori">
				<div class="item">
					<img src="{{asset('client/img/clients-logo/c-logo-1.png')}}" alt="">
				</div>
				<div class="item">
					<img src="{{asset('client/img/clients-logo/c-logo-2.png')}}" alt="">
				</div>
				<div class="item">
					<img src="{{asset('client/img/clients-logo/c-logo-3.png')}}" alt="">
				</div>
				<div class="item">
					<img src="{{asset('client/img/clients-logo/c-logo-4.png')}}" alt="">
				</div>
				<div class="item">
					<img src="{{asset('client/img/clients-logo/c-logo-5.png')}}" alt="">
				</div>
			</div>
		</div>
	</section>
	<!--================End Kategori =================-->

	<!--================Feature Product Area =================-->
	<section class="feature_product_area section_gap">
		<div class="container-fluid">
			<div class="sliderx-set">
				<!-- box set 1 -->
				<div class="box-set">
					@foreach($events as $event)
					<a href="single-product.php">
					<div class="box">
						<div class="box-image">
							<img src="{{ URL::asset('storage/poster/'. $event->photo) }}">
						</div>
						<div class="content">
							<span class="title">{{ $event->name }}</span>
							<span class="waktu">{{ $event->date }}</span>
							<span class="lokasi">tidak ada field</span>
						</div>
					</div>
					</a>
					@endforeach

				</div>
				<!-- box set 2 -->
				<div class="box-set">
					<a href="single-product.php">
					<div class="box">
						<div class="box-image">
							<img src="{{asset('client/img/product/feature-product/6.jpeg')}}">
						</div>
						<div class="content">
							<span class="title">Judul</span>
							<span class="waktu">SABTU, 4 APRIL 2019</span>
							<span class="lokasi">TAMAN BUDAYA, PADANG</span>
						</div>
					</div>
					</a>
					<a href="single-product.php">
					<div class="box">
						<div class="box-image">
							<img src="{{asset('client/img/product/feature-product/7.jpeg')}}">
						</div>
						<div class="content">
							<span class="title">Judul</span>
							<span class="waktu">SABTU, 4 APRIL 2019</span>
							<span class="lokasi">TAMAN BUDAYA, PADANG</span>
						</div>
					</div>
					</a>
					<a href="single-product.php">
					<div class="box">
						<div class="box-image">
							<img src="{{asset('client/img/product/feature-product/8.jpeg')}}">
						</div>
						<div class="content">
							<span class="title">Judul</span>
							<span class="waktu">SABTU, 4 APRIL 2019</span>
							<span class="lokasi">TAMAN BUDAYA, PADANG</span>
						</div>
					</div>
					</a>
					<a href="single-product.php">
					<div class="box">
						<div class="box-image">
							<img src="{{asset('client/img/product/feature-product/9.jpeg')}}">
						</div>
						<div class="content">
							<span class="title">Judul</span>
							<span class="waktu">SABTU, 4 APRIL 2019</span>
							<span class="lokasi">TAMAN BUDAYA, PADANG</span>
						</div>
					</div>
					</a>
					<a href="single-product.php">
					<div class="box">
						<div class="box-image">
							<img src="{{asset('client/img/product/feature-product/7.jpeg')}}">
						</div>
						<div class="content">
							<span class="title">Judul</span>
							<span class="waktu">SABTU, 4 APRIL 2019</span>
							<span class="lokasi">TAMAN BUDAYA, PADANG</span>
						</div>
					</div>
					</a>
				</div>
			</div>
		</div>
	</section>
	<!--================End Feature Product Area =================-->

	<!--================ Produk Area ================-->
	<section class="produk-area section_gap">
		<div class="container">
			<div class="view">
				<select id="view">
					<option value="small">SMALL VIEW</option>
					<option value="medium">MEDIUM VIEW</option>
				</select>
			</div>
			<!-- view 1  = medium, view 2 = small -->
			<div class="view-set view-2">
				<div class="produk">
					<div class="box-produk">
						<div class="produk-img">
							<img src="{{asset('client/img/product/feature-product/1.jpeg')}}">
							<a class="icon_btn qr" href="{{asset('client/img/clients-logo/qr-kode.png')}}">
								<i class="fa fa-qrcode"></i>
							</a>
						</div>
						<div class="content-set">
							<div class="content">
								<span class="kategori">SEMINAR NASIONAL</span>
								<span class="judul">JUDUL ACARA YANG DI ADAKAN</span>
								<span class="waktu">SENIN, 24 APRIL 2019</span>
								<!-- <span class="desk">Disini adalah bagian dimana pengunjung bisa membaca sedikit dari detail acara yang akan kamu adakan, sehingga pengunjung bisa mendapat sedikit informasi dari acara, sehingga pengunjung sedikit mengerti tentang acara ini dan memiliki alasan untuk menekan tombol View Detail untuk mengetahui informasi lebih baik...  Baca Selengkapnya...</span> -->
								<span class="desk">Disini adalah bagian dimana pengunjung bisa membaca sedikit dari detail acara yang akan kamu adakan, sehingga pengunjung bisa mendapat sedikit informasi dari acara..  Baca Selengkapnya...</span>
							</div>
							<div class="foot">
								<span class="lokasi">PKM UNAND - UNIVERSITAS ANDALAS</span>
								<a href="single-product.php" class="btn-view">VIEW DETAIL</a>
							</div>
						</div>
					</div>

					<div class="box-produk">
						<div class="produk-img">
							<img src="{{asset('client/img/product/feature-product/2.jpeg')}}">
						</div>
						<div class="content-set">
							<div class="content">
								<span class="kategori">SEMINAR NASIONAL</span>
								<span class="judul">JUDUL ACARA YANG DI ADAKAN</span>
								<span class="waktu">SENIN, 24 APRIL 2019</span>
								<!-- <span class="desk">Disini adalah bagian dimana pengunjung bisa membaca sedikit dari detail acara yang akan kamu adakan, sehingga pengunjung bisa mendapat sedikit informasi dari acara, sehingga pengunjung sedikit mengerti tentang acara ini dan memiliki alasan untuk menekan tombol View Detail untuk mengetahui informasi lebih baik...  Baca Selengkapnya...</span> -->
								<span class="desk">Disini adalah bagian dimana pengunjung bisa membaca sedikit dari detail acara yang akan kamu adakan, sehingga pengunjung bisa mendapat sedikit informasi dari acara..  Baca Selengkapnya...</span>
							</div>
							<div class="foot">
								<span class="lokasi">PKM UNAND - UNIVERSITAS ANDALAS</span>
								<a href="single-product.php" class="btn-view">VIEW DETAIL</a>
							</div>
						</div>
					</div>

					<div class="box-produk">
						<div class="produk-img">
							<img src="{{asset('client/img/product/feature-product/3.jpeg')}}">
						</div>
						<div class="content-set">
							<div class="content">
								<span class="kategori">SEMINAR NASIONAL</span>
								<span class="judul">JUDUL ACARA YANG DI ADAKAN</span>
								<span class="waktu">SENIN, 24 APRIL 2019</span>
								<!-- <span class="desk">Disini adalah bagian dimana pengunjung bisa membaca sedikit dari detail acara yang akan kamu adakan, sehingga pengunjung bisa mendapat sedikit informasi dari acara, sehingga pengunjung sedikit mengerti tentang acara ini dan memiliki alasan untuk menekan tombol View Detail untuk mengetahui informasi lebih baik...  Baca Selengkapnya...</span> -->
								<span class="desk">Disini adalah bagian dimana pengunjung bisa membaca sedikit dari detail acara yang akan kamu adakan, sehingga pengunjung bisa mendapat sedikit informasi dari acara..  Baca Selengkapnya...</span>
							</div>
							<div class="foot">
								<span class="lokasi">PKM UNAND - UNIVERSITAS ANDALAS</span>
								<a href="single-product.php" class="btn-view">VIEW DETAIL</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Produk Area ================-->

	<!--================ Subscription Area ================-->
	<section class="subscription-area section_gap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="section-title text-center">
						<h2>Subscribe for Our Newsletter</h2>
						<span>We won’t send any kind of spam</span>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div id="mc_embed_signup">
						<form target="_blank" novalidate action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&id=92a4423d01"
						 method="get" class="subscription relative">
							<input type="email" name="EMAIL" placeholder="Email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'"
							 required="">
							<!-- <div style="position: absolute; left: -5000px;">
								<input type="text" name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="">
							</div> -->
							<button type="submit" class="newsl-btn">Get Started</button>
							<div class="info"></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Subscription Area ================-->

	@include('partial/_footer')



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('client/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('client/js/popper.js')}}"></script>
<script src="{{asset('client/js/bootstrap.min.js')}}"></script>
<script src="{{asset('client/js/stellar.js')}}"></script>
<script src="{{asset('client/vendors/lightbox/simpleLightbox.min.js')}}"></script>
<!-- <script src="vendors/lightbox/lightbox-plus-jquery.min.js"></script> -->
<script src="{{asset('client/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('client/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('client/vendors/isotope/isotope-min.js')}}"></script>
<script src="{{asset('client/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('client/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('client/vendors/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('client/vendors/flipclock/timer.js')}}"></script>
<script src="{{asset('client/vendors/counter-up/jquery.counterup.js')}}"></script>
<script src="{{asset('client/js/mail-script.js')}}"></script>
<script src="{{asset('client/js/theme.js')}}"></script>
<script src="{{asset('client/js/jquery.bxslider.min.js')}}"></script>
<script>
	$(document).ready(function(){
	  $('.sliderx-set').bxSlider();
	});
</script>
<script type="text/javascript">
$(document).ready(function(){
	var lightbox = $('.view-set.view-2 .produk .box-produk .produk-img a.qr').simpleLightbox();
	// scroll top
	var offset = 250;
    var duration = 300;
    $(window).scroll(function(){
        if ($(this).scrollTop() > offset) {
            $('.go-top').fadeIn(duration);
        }else{
            $('.go-top').fadeOut(duration);
        }
    });
    $('.to-top').click(function(){
    	$('body').animate({scrollTop: 0},2000);
    });
    // end scroll top
    $(window).scroll(function(){
        if ($(this).scrollTop() > 700) {
            $('.search-box').addClass('search-fixed');
            $('.search-menu').addClass('search-menu-show');
        }else{
            $('.search-box').removeClass('search-fixed');
            $('.search-menu').removeClass('search-menu-show');
        }
    });

    // start view medium dan small
    // $('div.view-set').addClass('view-1');
    $('#view').change(function(){
    	var pilih = $(this).val();
    	if(pilih=="small"){
    		$('div.view-set').removeClass('view-1');
    		$('div.view-set').removeClass('view-2');
    		$('div.view-set').addClass('view-2');
    	}else if(pilih=="medium"){
    		$('div.view-set').removeClass('view-2');
    		$('div.view-set').removeClass('view-1');
    		$('div.view-set').addClass('view-1');
    	}
    });
    // end   view medium dan smalll

});
</script>
</body>
