@include('partial/_guest_header')

	<!--================Home Banner Area =================-->
	<section class="home_banner_area">
		<div class="overlay"></div>
		<div class="banner_inner d-flex align-items-center">
			<div class="container-fluid">

				<div class="banner_content row">
					<div class="offset-lg-2 col-lg-8 tengah">
						<div class="populer">
							@foreach($subEventRatings2 as $data)
							<a href="{{ url('event/'. $data->subEvent->slug) }}">{{ $data->subEvent->name }}</a>
							@endforeach
						</div>
					</div>
					<div class="tengah">
						<a class="x-button" href="{{ url('event') }}">Lihat Event</a>
					</div>
				</div>

				<div class="search-menu"></div>

				<div class="search-box col-lg-10">
					<form name="fsearch" action="{{ url('event/search') }}" method="post">
						{{ csrf_field() }}
						<div class="cari">
							<input id="cari" type="text" name="event" placeholder="Cari Event Disini .." autofocus="autofocus">
							<script type="text/javascript">
								var input = document.getElementById("cari");
								input.addEventListener("keyup", function(event) {
								if (event.keyCode === 13) {
								 event.preventDefault();
								 document.getElementById("myBtn").click();
								}
								});
							</script>
						</div>
						<div class="submit">
							<button id="myBtn" type="submit" style="font-size:95%">SEARCH</button>
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
							@if(!Auth::check())
							<h2>Daftarkan Dirimu Disini!</h2>
							@else
							<h2>Welcome {{ Auth::user()->username }}</h2>
							@endif
						</div>
						<a class="hot_deal_link" href="{{ url('register')}}"></a>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="hot_deal_box">
						<img class="img-fluid" src="{{asset('client/img/deal1.jpg')}}" alt="">
						<div class="content">
							<h2>Daftarkan Organisasimu Disini!</h2>
							<!-- <p>go!</p> -->
						</div>
						<a class="hot_deal_link" href="{{ url('/register-organization')}}"></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Hot Deals Area =================-->

	<!--================Kategori =================-->
	<section class="clients_logo_area">
		<div class="container-fluid">
			<marquee scrollamount="3">
			@foreach($categories as $value)
				<a href="{{ url('event/all/all/' . $value->id) }}" style="font-size: 200%;margin-right: 5%;color:white;font-weight:bold"> {{$value->name}} </a>
			@endforeach
			</marquee>
		</div>
	</section>
	<!--================End Kategori =================-->

	<!--================Feature Product Area =================-->
	<section class="feature_product_area section_gap">
		<div class="container-fluid">
				<!-- box set 1 -->
				<div class="box-set">
					@php $a = 10; $x = 1000; @endphp
					@foreach($subEvents as $subEvent)
						@if($a > 5)
							<div class="card">
								<div class="card-img" style="width:100%;height:200px;overflow:hidden;">
									<img class="card-img-top load-delay{{ $subEvent->id }}" src="/client/css/images/bx_loader.gif" data-original="{!! URL::asset('storage/poster/_medium/'.$subEvent->photo) !!}">
								</div>
								<a href="{{ url('event/' . $subEvent->slug) }}">
								<div class="card-body">
							    	<h5 class="card-title">
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
							    	</h5>
							    	<p style="font-size: 80%" class="waktu"><span><i class="fa fa-calendar"></i></span> @php echo \Carbon\Carbon::parse($subEvent->date)->format('l, d F Y'); @endphp</p>
							    	<p style="font-size: 80%" class="lokasi"><span><i class="fa fa-map-marker"></i></span> {{ $subEvent->location }}</p>
								</div>
								</a>
							</div>

							<script type="text/javascript">
								$(document).ready(function () {
								setTimeout(function () {
									$('.load-delay{{ $subEvent->id }}').each(function () {
										var imagex = $(this);
										var imgOriginal = imagex.data('original');
										$(imagex).attr('src', imgOriginal);
									});
								}, 1000 + {{ $x }});
								});
							</script>

						@endif
					@php $a--; $x = $x + 1000; @endphp
					@endforeach
				</div>
		</div>
	</section>
	<!--================End Feature Product Area =================-->

	<!--================ Produk Area ================-->
	<section class="produk-area section_gap">
		<div class="container">
			<div class="view">
				<div class="col-md-3">
					<select id="view" class="form-control">
						<option value="small">Small View</option>
						<option value="medium">Medium View</option>
					</select>
				</div>
			</div>
			<!-- view 1  = medium, view 2 = small -->
			<div class="view-set view-2">
				<div class="produk">

					@php $x = 5000; @endphp
					@foreach($subEventRatings as $data)
					<div class="box-produk" style="margin:5%">
						<div class="produk-img">
							<img class="load-delay-second{{ $data->subEvent->id }}" src="/client/css/images/bx_loader.gif" data-original="{{ asset('storage/poster/_medium/'. $data->subEvent->photo)}}">
							<a class="icon_btn qr" href="{{asset('storage/qr/event/'. $data->subEvent->qr_code)}}">
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

							</div>
							<span class="lokasi"><span>{{ $data->subEvent->location }} </span></span>
							<a href="{{ url('event/' . $data->subEvent->slug) }}" class="btn-view">VIEW DETAIL</a>
						</div>
					</div>

					<script type="text/javascript">
						$(document).ready(function () {
						setTimeout(function () {
							$('.load-delay-second{{ $data->subEvent->id }}').each(function () {
								var imagex = $(this);
								var imgOriginal = imagex.data('original');
								$(imagex).attr('src', imgOriginal);
							});
						}, 1000 + {{ $x }});
						});
					</script>

						@php $x = $x + 1000; @endphp
					@endforeach

				 <center><a href="{{ url('event') }}" class="btn btn-primary">Show More</a></center>

				</div>
			</div>
		</div>
	</section>
	<!--================ End Produk Area ================-->

	<style>
	*{box-sizing:border-box}
	.autocomplete{position:relative;display:inline-block}
	.autocomplete-items{position:absolute;border:1px solid #d4d4d4;border-bottom:none;border-top:none;z-index:99;top:70%;left:15%;right:15%;text-align:left}
	.autocomplete-items div{padding:10px;cursor:pointer;background-color:#ffffffe6;border-bottom:1px solid #d4d4d4}
	.autocomplete-items div:hover{background-color:#019fe8}
	.autocomplete-active{background-color:#1e90ff!important;color:#fff}
	</style>
	@include('partial/_guest_js_search_index')

	@include('partial/_guest_subscribe_area')
	@include('partial/_guest_footer')


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
<!-- <script src="{{asset('client/js/theme.js')}}"></script> -->
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
