@include('partial/_guest_header')

	<!--================Home Banner Area =================-->
	<section class="home_banner_area">
		<div class="overlay"></div>
		<div class="banner_inner d-flex align-items-center">
			<div class="container-fluid">

				<div class="banner_content row">
					<div class="offset-lg-2 col-lg-8 tengah">
						<div class="populer">
							<h1 style="color:white">Hasil Pencarian Untuk "{{ $query }}"</h1>
						</div>
					</div>
				</div>

				<div class="search-menu"></div>

				<div class="search-box col-lg-10">
					<form name="fsearch" action="{{ url('event/search') }}" method="post">
						{{ csrf_field() }}
						<div class="cari">
							<input id="cari" type="text" name="event" placeholder="Cari Event Disini .." autofocus="autofocus">
						</div>
						<div class="submit">
							<button type="submit" style="font-size:95%">SEARCH</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</section>

	<!--================End Home Banner Area =================-->

	<!--================ Produk Area ================-->
	<section class="produk-area section_gap">
		<div class="container" style="margin-top: 5%">
			<!-- view 1  = medium, view 2 = small -->
			<div class="view-set view-2">
				<div class="produk">

          @if($event->isEmpty())
            <center style="margin-top:10%"><h1>Not Found</h1></center>
          @endif

					@php $x = 2000; @endphp
					@foreach($event as $data)
					<div class="box-produk">
						<div class="produk-img">
							<img class="load-delay-second{{ $data->id }}" src="/client/css/images/bx_loader.gif" data-original="{{ asset('storage/poster/_medium/'. $data->photo)}}">
							<a class="icon_btn qr" href="{{asset('storage/qr/event/'. $data->qr_code)}}">
								<i class="fa fa-qrcode"></i>
							</a>
						</div>
						<div class="content-set">
							<div class="content">
								<span class="kategori"></span>
								<span class="judul">{{ $data->name }}</span>
								<span class="waktu">@php echo \Carbon\Carbon::parse($data->date)->format('l, d F Y'); @endphp</span>
								<!-- <span class="desk">Disini adalah bagian dimana pengunjung bisa membaca sedikit dari detail acara yang akan kamu adakan, sehingga pengunjung bisa mendapat sedikit informasi dari acara, sehingga pengunjung sedikit mengerti tentang acara ini dan memiliki alasan untuk menekan tombol View Detail untuk mengetahui informasi lebih baik...  Baca Selengkapnya...</span> -->
								<span class="desk">
									@php
										$string = $data->description;
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
							<span class="lokasi"><span>{{ $data->location }} </span></span>
							<a href="{{ url('event/' . $data->slug) }}" class="btn-view">VIEW DETAIL</a>
						</div>
					</div>

					<script type="text/javascript">
						$(document).ready(function () {
						setTimeout(function () {
							$('.load-delay-second{{ $data->id }}').each(function () {
								var imagex = $(this);
								var imgOriginal = imagex.data('original');
								$(imagex).attr('src', imgOriginal);
							});
						}, 1000 + {{ $x }});
						});
					</script>

						@php $x = $x + 1000; @endphp
					@endforeach

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
