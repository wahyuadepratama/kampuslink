@include('partial/_header')

	<!--================Home Banner Area =================-->
	<section class="home_banner_area">
		<div class="overlay"></div>
		<div class="banner_inner d-flex align-items-center">
			<div class="container-fluid">

				<div class="banner_content row">
					<div class="offset-lg-2 col-lg-8 tengah">
						<div class="populer">
							@foreach($subEventRatings2 as $data)
							<a href="/event/{{ $data->subEvent->slug }}">{{ $data->subEvent->name }}</a>
							@endforeach
						</div>
					</div>
					<div class="tengah">
						<a class="x-button" href="/event">Lihat Event</a>
					</div>
				</div>

				<div class="search-menu"></div>

				<div class="search-box col-lg-10">
					<form>
						<div class="kategori">
							<select>
								<option selected="" value="">KATEGORI</option>
								@foreach($categories as $category)
								<option value="/category/{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="cari">
							<input id="cari" type="text" name="" placeholder="CARI EVENT DISINI...">
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
						<img class="img-fluid" src="{{asset('client/img/deal1.jpg')}}">



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
						<img class="img-fluid" src="{{asset('client/img/deal1.jpg')}}" alt="">
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
					@php $a = 10 @endphp
					@foreach($subEvents as $subEvent)
						@if($a > 5)
							<a href="/event/{{ $subEvent->slug }}">
							<div class="box">
								<div class="box-image">
									<img class="load-delay" src="/client/css/images/bx_loader.gif" data-original="{{ URL::asset('storage/poster/'. $subEvent->photo) }}">
								</div>
								<div class="content">
									<span class="title">
										@php
											$string = $subEvent->name;
											$string = strip_tags($string);

											if (strlen($string) > 15) {
												$trimstring = substr($string, 0, 15);
											} else {
												$trimstring = $string;
											}
											echo $trimstring . ' ..';
										@endphp
									</span>
									<span class="waktu">@php echo \Carbon\Carbon::parse($subEvent->date)->format('l, d F Y'); @endphp</span>
									<span class="lokasi">{{ $subEvent->location }}</span>
								</div>
							</div>
							</a>
						@endif
						@php $a--; @endphp
					@endforeach
				</div>
				<!-- box set 2 -->
				<div class="box-set">
					@php $a = 10 @endphp
					@foreach($subEvents as $subEvent)
						@if($a < 6)
							<a href="/event/{{ $subEvent->slug }}">
							<div class="box">
								<div class="box-image">
									<img class="load-delay" src="/client/css/images/bx_loader.gif" data-original="{{ URL::asset('storage/poster/'. $subEvent->photo) }}">
								</div>
								<div class="content">
									<span class="title">
										@php
											$string = $subEvent->name;
											$string = strip_tags($string);

											if (strlen($string) > 15) {
												$trimstring = substr($string, 0, 15);
											} else {
												$trimstring = $string;
											}
											echo $trimstring . ' ..';
										@endphp
									</span>
									<span class="waktu">@php echo \Carbon\Carbon::parse($subEvent->date)->format('l, d F Y'); @endphp</span>
									<span class="lokasi">{{ $subEvent->location }}</span>
								</div>
							</div>
							</a>
						@endif
						@php $a--; @endphp
					@endforeach
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

					@foreach($subEventRatings as $data)
					<div class="box-produk">
						<div class="produk-img">
							<img class="load-delay1" src="/client/css/images/bx_loader.gif" data-original="{{ asset('storage/poster/'. $data->subEvent->photo)}}">
							<a class="icon_btn qr" href="{{asset('client/img/clients-logo/qr-kode.png')}}">
								<i class="fa fa-qrcode"></i>
							</a>
						</div>
						<div class="content-set">
							<div class="content">
								<span class="kategori"></span>
								<span class="judul">{{ $data->subEvent->name }}</span>
								<span class="waktu">@php echo \Carbon\Carbon::parse($data->subEvent->date)->format('l, d F Y'); @endphp</span>
								<!-- <span class="desk">Disini adalah bagian dimana pengunjung bisa membaca sedikit dari detail acara yang akan kamu adakan, sehingga pengunjung bisa mendapat sedikit informasi dari acara, sehingga pengunjung sedikit mengerti tentang acara ini dan memiliki alasan untuk menekan tombol View Detail untuk mengetahui informasi lebih baik...  Baca Selengkapnya...</span> -->
								<span class="desk">
									@php
										$string = $data->subEvent->description;
										$string = strip_tags($string);

										if (strlen($string) > 250) {
											$trimstring = substr($string, 0, 250);
										} else {
											$trimstring = $string;
										}
										echo $trimstring;
									@endphp
								</span>
							</div>
							<div class="foot">
								<span class="lokasi">{{ $data->subEvent->location }} </span>
								<a href="/event/{{ $data->subEvent->slug }}" class="btn-view">VIEW DETAIL</a>
							</div>
						</div>
					</div>
					@endforeach

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
<!-- <script src="{{asset('client/vendors/flipclock/timer.js')}}"></script> -->
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

		// load image delay 1

			$(document).ready(function () {
			setTimeout(function () {
				$('.load-delay').each(function () {
					var imagex = $(this);
					var imgOriginal = imagex.data('original');
					$(imagex).attr('src', imgOriginal);
				});
			}, 3000);
			});

		// load image delay 2

			$(document).ready(function () {
			setTimeout(function () {
				$('.load-delay1').each(function () {
					var imagex = $(this);
					var imgOriginal = imagex.data('original');
					$(imagex).attr('src', imgOriginal);
				});
			}, 5000);
			});

});
</script>
</body>
