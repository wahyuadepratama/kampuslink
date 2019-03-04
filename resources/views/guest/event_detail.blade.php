@include('partial/_header')

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">

				<div class="col-lg-6">
					<div class="s_product_img">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="d-block w-100" src="{{asset('storage/poster/_large/'. $subEvent->photo)}}" alt="First slide">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="s_product_text">
						<div>
							<h2>DETAIL INFO </h2>
						</div>
						<div class="detail">

							<div class="content">
								<ul class="list">
									<li>
										<a class="active" href="#">
											<span><i class="fa fa-th-large"></i></span>
											@php $count = count($categories) @endphp
											@foreach($categories as $category)

												{{$category->category->name}}

												@php $count--; @endphp

												@if($count > 0)
													@php echo ","; @endphp
												@endif

											@endforeach
										</a>
									</li>
									<li>
										<a href="#">
											<span><i class="fa fa-home"></i></span> {{ $subEvent->event->organization->name }}
										</a>
									</li>
									<li>
										<a href="#">
											<span><i class="fa fa-map-marker"></i></span> {{ $subEvent->location }} </a>
									</li>
									<br><li style="font-weight: bold">Kontak :</li>
									<li>
										<a href="#"><img src="{{asset('client/img/icon/whatsapp.png')}}">&nbsp; {{ $subEvent->whatsapp }} </a>
									</li>
									<li>
										<a href="#"><img src="{{asset('client/img/icon/line.png')}}">&nbsp; {{ $subEvent->line }}</a>
									</li>
									<li>
										<a href="{{ $subEvent->web_link }}"><img src="{{asset('client/img/icon/web.png')}}" style="width: 4%">&nbsp; {{ $subEvent->web_link }}</a>
									</li>
								</ul>
							</div>

							<!-- <div class="qr">
								<img src="{{ asset('client/img/clients-logo/qr-kode.png') }}">
							</div> -->

						</div>
					</div>

					<section class="deskripsi-area section_gap">
						<div class="container">
							<div class="content">
								<div class="title">
									<h2>{{ $subEvent->name }}</h2>
									<p>@php echo \Carbon\Carbon::parse($subEvent->date)->format('l, d F Y'); @endphp</p>
								</div>
								<div class="desk">
									<p>{{ $subEvent->description }}</p>
								</div>
								<div class="e-tiket">
									<a href="{{ url('event/' .$subEvent->slug)}}/process">BELI TIKET</a>
								</div>
							</div>
						</div>
					</section>

				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<section class="feature_product_area p_120">
		<div class="container-fluid">
			<h4>Event Disarankan</h4>
			<div class="sliderx-set">
				<!-- box set 1 -->
				<div class="box-set">
					@php $a = 10; $x = 1000; @endphp
					@foreach($suggestions as $subEvent)
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

				<div class="box-set">
					@php $a = 10; $x = 3000; @endphp
					@foreach($suggestions as $subEvent)
						@if($a < 6)
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
					    	<p class="waktu" style="font-size: 80%"><span><i class="fa fa-calendar"></i></span> @php echo \Carbon\Carbon::parse($subEvent->date)->format('l, d F Y'); @endphp</p>
					    	<p class="lokasi" style="font-size: 80%"><span><i class="fa fa-map-marker"></i></span> {{ $subEvent->location }}</p>
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
		</div>
	</section>

  <!--================ Subscription Area ================-->
  @include('partial/_subscribe_area')
  <!--================ End Subscription Area ================-->

  <!--================ start footer Area  =================-->
  @include('partial/_footer')
  <!--================ End footer Area  =================-->


<!-- Optional JavaScript -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('client/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('client/js/popper.js')}}"></script>
<script src="{{asset('client/js/bootstrap.min.js')}}"></script>
<script src="{{asset('client/js/stellar.js')}}"></script>
<script src="{{asset('client/vendors/lightbox/simpleLightbox.min.js')}}"></script>
<script src="vendors/lightbox/lightbox-plus-jquery.min.js"></script>
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
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script type="text/javascript">

	$(document).ready(function () {
	setTimeout(function () {
		$('.load-delay').each(function () {
			var imagex = $(this);
			var imgOriginal = imagex.data('original');
			$(imagex).attr('src', imgOriginal);
		});
	}, 3000);
	});

</script>

<script type="text/javascript">
$(document).ready(function(){
	var lightbox = $('.card_area a.icon_btn.qr').simpleLightbox();
});
</script>

</body>

</html>
